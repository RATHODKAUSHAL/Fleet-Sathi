var CityMasterSelect2_city = function() {
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
    CityMasterSelect2_city.init();
});
