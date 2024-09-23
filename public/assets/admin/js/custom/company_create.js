var CitySelect2_city = function() {
    var demos = function() {
    var url = $("#city_url").attr("data-url");
    $("#select_city").select2({
        placeholder: "Search for Location",
        dataType: 'json',
        ajax: {
            url: url,
        },
        
        });
    }
    return {
        init: function() {
            demos();
        }
    };
}();

jQuery(document).ready(function() {
    CitySelect2_city.init();
});

var UserSelect2_user = function() {
    var demos = function() {
    var url = $("#user_url").attr("data-url");
    $("#select_user").select2({
        placeholder: "Search for Location",
        dataType: 'json',
        ajax: {
            url: url,
        },
        
        });
    }
    return {
        init: function() {
            demos();
        }
    };
}();

jQuery(document).ready(function() {
    UserSelect2_user.init();
});