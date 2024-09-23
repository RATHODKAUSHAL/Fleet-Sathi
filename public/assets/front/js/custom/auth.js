const callback = (userinfo) => {
    const mobileMap = otplessUser.identities.find(
        (item) => item.identityType === "MOBILE"
    )?.identityValue;
    
    if (userinfo.status) {
        $('#loader').show();
        $.ajax({
            url: $('#login-btn').attr('data-url'),
            method: "post",
            headers: {
                'X-CSRF-Token': csrfToken
            },
            dataType: "JSON",
            data: $('#signup-otp-form').serialize(),
            success: function (response) {
                if (response.success) {
                    $('#loader').hide();
                    window.location.replace(response.redirect_url)
                }else{
                    $('#loader').hide();
                    document.getElementById('otp-error').classList.remove('hidden');
                }
            }
        });
    } else {
        $('#loader').hide();
        document.getElementById('otp-error').classList.remove('hidden');
    }
    // Implement your custom logic here.
};
// Initialize OTPLESS SDK with the defined callback.
const OTPlessSignin = new OTPless(callback);

const phoneAuth = () => {
    OTPlessSignin.initiate({
      channel: "PHONE",
      phone: $('#contact_number').val(),
      countryCode: "+91",
    });
};

const verifyOTP = () => {
    OTPlessSignin.verify({
      channel: "PHONE",
      phone: $('#contact_number').val(),
      otp: $('#otp').val(),
      countryCode: "+91",
    });
};

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

renderForm($('#render-form').attr('data-url'));

function renderForm(renderUrl) {
    $('#loader').show();
    $.ajax({
        url: renderUrl,
        method: "post",
        headers: {
            'X-CSRF-Token': csrfToken
        },
        success: function (response) {
            if (response.success) {
                $('#loader').hide();
                $('#render-form').html(response.render_form);
            }
        }
    });
}

signup = function () {
    $(".input-error").remove();
    document.getElementById('otp-error').classList.add('hidden')
    $('#loader').show();
    $.ajax({
        url: $('#signup-form').attr('action'),
        method: "post",
        headers: {
            'X-CSRF-Token': csrfToken
        },
        dataType: "JSON",
        data: $('#signup-form').serialize(),
        success: function (response) {
            if (response.success) {
                $('#loader').hide();
                var phoneNumber = response.contact_number;
                OTPlessSignin.initiate({
                    channel: "PHONE",
                    phone: phoneNumber,
                    countryCode: "+91",
                });
                renderForm(response.redirect_url);
                setTimeout(initCode,1000);
            }else{
                $('#loader').hide();
            }
        },
        error: function (response) {
            $('#loader').hide();
            $(".input-error").remove();
            if (response.responseJSON.errors) {
                Object.entries(response.responseJSON.errors).forEach(([key, value]) => {
                    var paragraph = $("<p>").addClass("text-sm font-bold text-red-800 rounded-lg dark:text-red-400 input-error").text(value);
                    $(`#${key}`).next().html('');
                    $(`#${key}`).after(paragraph);
                });
            }
        }
    });
}

signupOtp = function () {
    $(".input-error").remove();
    document.getElementById('otp-error').classList.add('hidden')
    $('#loader').show();
    $.ajax({
        url: $('#signup-otp-form').attr('action'),
        method: "post",
        headers: {
            'X-CSRF-Token': csrfToken
        },
        dataType: "JSON",
        data: $('#signup-otp-form').serialize(),
        success: function (response) {
            if (response.success) {
                $('#loader').hide();
                verifyOTP();
            } else {
                $('#loader').hide();
                document.getElementById('otp-error').classList.remove('hidden');
            }
        },
        error: function (response) {
            $('#loader').hide();
            $(".input-error").remove();
            if (response.responseJSON.errors) {
                Object.entries(response.responseJSON.errors).forEach(([key, value]) => {
                    var paragraph = $("<p>").addClass("text-sm font-bold text-red-800 rounded-lg dark:text-red-400 input-error").text(value);
                    $(`#${key}`).next().html('');
                    $(`#${key}`).after(paragraph);
                });
            }
        }
    });
}

function initCode() {
    var n, i, o, u, x, y;
    var code;
    n = document.querySelector("[name=code_1]");
    i = document.querySelector("[name=code_2]");
    o = document.querySelector("[name=code_3]");
    u = document.querySelector("[name=code_4]");
    x = document.querySelector("[name=code_5]");
    y = document.querySelector("[name=code_6]");
    n.focus();

    function handleKeyUp(current, next, prev) {
        current.addEventListener("keyup", function (e) {
            if (e.key === "Backspace" && this.value.length === 0) {
                prev && prev.focus();
            } else if (this.value.length === 1) {
                next && next.focus();
                code = n.value + i.value + o.value + u.value + x.value + y.value;
                $('#otp').val(code);
            }
        });
    }

    handleKeyUp(n, i, null);
    handleKeyUp(i, o, n);
    handleKeyUp(o, u, i);
    handleKeyUp(u, x, o);
    handleKeyUp(x, y, u);
    handleKeyUp(y, null, x);
}