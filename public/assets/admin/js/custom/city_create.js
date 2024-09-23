function initMap() {
    const input = document.getElementById("city_input");
    const options = {
        types: ['(cities)'],
        ComponentRestrictions : {country: "IN"},
        fields: ["formatted_address", "geometry", "name", "address_components","place_id"],
        strictBounds: false,
    };

    const autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        for (var i = 0; i < place.address_components.length; i++) {
            var component = place.address_components[i];
            if (component.types.includes("administrative_area_level_1")) {
                state_name = component.long_name;
            }
        }

        $.ajax({
            url: $('#state_id').attr("data-url"),
            method: 'get',
            data:  {
                state_name: state_name,
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    var option = document.createElement('option');
                    option.value = response.state.id;
                    option.textContent = response.state.state_name;
                    option.selected = true;
                    document.getElementById('state_id').appendChild(option);
                }
            }
        });

        document.getElementById('location_detail').value = JSON.stringify(place);
    });

    

}

var StateSelect2_state = function() {
    var demos = function() {
    var url = $("#state_url").attr("data-url");
    $("#select_state").select2({
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
    StateSelect2_state.init();
});