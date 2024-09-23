const apiUrl = document.querySelector('#user_table').getAttribute('data-url');
const element = document.querySelector('#user_table');
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
        email: {
			title: 'Email',
		},
        contact: {
			title: 'Contact',
		},
        actions: {
			render: (item, data, context) => {
				return item;
			},
		},
    }
};
const dataTable = new KTDataTable(element, dataTableOptions);
