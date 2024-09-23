const apiUrl = document.querySelector('#company_table').getAttribute('data-url');
const element = document.querySelector('#company_table');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const dataTableOptions = {
	apiEndpoint: apiUrl,
    requestHeaders: {
        'X-CSRF-TOKEN': csrfToken,
    },
    requestMethod: "POST",
	pageSize: 5,
    columns: {
        id: {
			title: '#',
		},
		company_name: {
			title: 'Company Name',
		},
        contact_number: {
			title: 'Contact Number',
		},
		admin: {
			title: 'Admin',
		},
        city: {
			title: 'City',
		},
		company_address: {
			title: 'Company Address',
		},
        actions: {
			render: (item, data, context) => {
				return item;
			},
		},
    }
};
const dataTable = new KTDataTable(element, dataTableOptions);

function resetFormFn() {
  	document.getElementById('filter_form').reset();
	dataTable.goPage(0);
	dataTable.search();
}

document.getElementById('filter_form').addEventListener('submit',function(event){
	event.preventDefault();
	var data = $('#filter_form').serialize();
	dataTable.goPage(0);
	dataTable.setPageSize(20);
	dataTable.search({
		data,
	});
});

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
