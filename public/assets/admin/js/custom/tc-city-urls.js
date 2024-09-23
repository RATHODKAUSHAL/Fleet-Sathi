const apiUrl = document.querySelector('#tc_city_urls_table').getAttribute('data-url');
const element = document.querySelector('#tc_city_urls_table');
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
		city_icon: {
			title: 'City Icon',
			render: (item, data, context) => {
				return item;
			},
		},
		city_name: {
			title: 'City Name',
			render: (item, data, context) => {
				return item;
			},
		},
		page_title: {
			title: 'Page Title',
		},
		meta_title: {
			title: 'Meta Title',
		},
		meta_description: {
			title: 'Meta Description',
		},
		city_heading: {
			title: 'City Heading',
		},	
        actions: {
			render: (item, data, context) => {
				return item;
			},
		},
    }
};
const dataTable = new KTDataTable(element, dataTableOptions);
