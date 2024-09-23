const apiUrl = document.querySelector('#state_table').getAttribute('data-url');
const element = document.querySelector('#state_table');
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
		state_name: {
			title: 'State Name',
		},
		state_abbr: {
			title: 'State Abbreviation',
		},
        actions: {
			render: (item, data, context) => {
				return item;
			},
		},
    }
};
const dataTable = new KTDataTable(element, dataTableOptions);
