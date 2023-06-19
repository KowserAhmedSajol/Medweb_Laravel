const qs = selector => document.querySelector(selector);
    const filterableElements = document.querySelectorAll('.filterable_input');
    const onChangeFilterableColumns = [];
    const onKeyPressFilterableColumns = [];
    const numberOfRowsPerPageInput = qs('#numberOfRowsPerPage');

    if(filterableElements){
        filterableElements.forEach(element => {
            if(element.type == 'text'){
                onKeyPressFilterableColumns.push(element.id)
            }else{
                onChangeFilterableColumns.push(element.id)
            }
        });
    }

    onChangeFilterableColumns.forEach(column => qs(`#${column}`).addEventListener('change', () => index()));
    onKeyPressFilterableColumns.forEach(column => $(`#${column}`).keyup(delay(() => index(), 800)));

    const filterableColumns = [...onChangeFilterableColumns, ...onKeyPressFilterableColumns];

    window.onload = () => {
        index();
        numberOfRowsPerPageInput.addEventListener('change', () => index());
    };

    async function index(page_url = null) {
        const rowsPerPage = numberOfRowsPerPageInput.options[numberOfRowsPerPageInput.selectedIndex].value;
        let queryString = 'rows_per_page=' + rowsPerPage;

        let filterColumns = '';
        filterableColumns.forEach(column => {
            filterColumns += `${column}=>${qs(`#${column}`).value}|`;
        });

        queryString += filterColumns.length > 0 ? '&filterable_columns='+ filterColumns : '';
        page_url = page_url || Endpoint + '?' + queryString;

        $(tableId).addClass('loading');
        const response = await fetch(page_url);
        const data = await response.json();
        const records = data.records;
        let sl = data.sl + 1;
        const parentElement = qs(tableBodyId);

        parentElement.innerHTML = `${records.data.map(row => {
            return `<tr>
                        <td>${sl++}</td>
                        <td>${row.title}</td>
						<td>${row.email}</td>

                        <td>
                            <x-sg-link-show href="${uri}/${row.uuid}" />
                            <x-sg-link-edit href="${uri}/${row.uuid}/edit" />
                            <x-sg-btn-delete action="${uri}/${row.uuid}" method="post" />
                        </td>
                    <tr>`
        }).join("")}`;

        /*Required arguments for pagination*/
        const paginationData = {
            parent_element: parentElement,
            url: Endpoint,
            current_page: records.current_page,
            last_page: records.last_page,
            total_rows: records.total,
            keyword: '',
            row_per_page: rowsPerPage,
            pages: data.pages,
            query_string: queryString
        };

        makePagination(paginationData);
        $(tableId).removeClass('loading');
    }

    function delay(fn, ms) {
        let timer = 0
        return function(...args) {
            clearTimeout(timer)
            timer = setTimeout(fn.bind(this, ...args), ms || 0)
        }
    }

    qs('#filterOptionsClearBtn').addEventListener('click', () => {
        filterableColumns.forEach(column => {
            qs('#'+column).value = '';
        });
        index();
    });
