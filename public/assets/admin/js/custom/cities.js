const apiUrl = document.querySelector('#city_table').getAttribute('data-url');
const element = document.querySelector('#city_table');
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
		name: {
			title: 'Name',
		},
		state: {
			title: 'State',
		},
		lat: {
			title: 'Lat',
		},
		lng: {
			title: 'Lng',
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

document.getElementById('filter_form').addEventListener('submit', function (event) {
	event.preventDefault();
	var data = $('#filter_form').serialize();
	dataTable.goPage(0);
	dataTable.setPageSize(20);
	dataTable.search({
		data,
	});
});

var StateSelect2_state = function () {
	var demos = function () {
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
		init: function () {
			demos();
		}
	};
}();

jQuery(document).ready(function () {
	StateSelect2_state.init();
});
