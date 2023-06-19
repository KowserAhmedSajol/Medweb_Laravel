function makePagination(args) {
    let currentPage = args.current_page ;
    let lastPage = args.last_page;
    let previousPage = currentPage - 1;
    let nextPage = currentPage + 1;
    let parentElement = args.parent_element;
    let totalRow = args.total_rows;
    let url = args.url;
    let keyword = args.keyword;
    let pages = args.pages;
    let rowsPerPage = args.row_per_page;
    let queryString = args.query_string;

    // console.log('Qs = '+queryString)

    let ponditPagination = document.querySelector('#ponditPagination');
    document.querySelector('.current-page-number').innerHTML = currentPage;
    document.querySelector('.total-page-number').innerHTML = lastPage;
    document.querySelector('.total-record-number').innerHTML = totalRow;

    function createListElements(){
        let ulElement = document.querySelector('#pagesList');
        ulElement.innerHTML = '';

        /*First page*/
        let liElement = document.createElement('li');
        liElement.className = 'page-item';
        let firstPageUrl = document.createElement('a');
        firstPageUrl.className = 'page-link';
        firstPageUrl.setAttribute('id', 'firstPage');
        firstPageUrl.innerHTML = 'First';
        liElement.appendChild(firstPageUrl);
        ulElement.appendChild(liElement);

        /*previous page li*/
        liElement = document.createElement('li');
        liElement.className = 'page-item';
        let previousPageUrl = document.createElement('a');
        previousPageUrl.className = 'page-link';
        previousPageUrl.setAttribute('id', 'previousPage');
        previousPageUrl.innerHTML = 'Previous';
        liElement.appendChild(previousPageUrl);
        ulElement.appendChild(liElement);

        firstPageUrl.addEventListener('click', function () {
            index(`${url}?page=1&${queryString}`);
            // e.stopImmediatePropagation(); // Try to remove me
        });

        pages.forEach(function (page) {
            liElement = document.createElement('li');
            let className = currentPage === page ? 'page-item active':'page-item';
            className =  page === '...'? className+' disabled' : className;
            liElement.className = className;
            let previousPageUrl = document.createElement('a');
            previousPageUrl.className = 'page-link';
            previousPageUrl.setAttribute('id', page);
            previousPageUrl.addEventListener('click', function () {
                index(`${url}?page=${page}&${queryString}`);
                // e.stopImmediatePropagation(); // Try to remove me
            });
            previousPageUrl.innerHTML = page;
            liElement.appendChild(previousPageUrl);
            ulElement.appendChild(liElement);
        });

        /*creating next page li*/
        liElement = document.createElement('li');
        liElement.className = 'page-item';
        let nextPageUrl = document.createElement('a');
        nextPageUrl.className = 'page-link';
        nextPageUrl.setAttribute('id', 'nextPage');
        nextPageUrl.innerHTML = 'Next';
        liElement.appendChild(nextPageUrl);
        ulElement.appendChild(liElement);


        /*First page*/
        liElement = document.createElement('li');
        liElement.className = 'page-item';
        let lastPageUrl = document.createElement('a');
        lastPageUrl.className = 'page-link';
        lastPageUrl.setAttribute('id', 'lastPage');
        lastPageUrl.innerHTML = 'Last';
        liElement.appendChild(lastPageUrl);
        ulElement.appendChild(liElement);


        lastPageUrl.addEventListener('click', function () {
            index(`${url}?page=${lastPage}&${queryString}`);
            // e.stopImmediatePropagation(); // Try to remove me
        });

    }

    function nextAndPrevious() {

        let nextPageLink = document.querySelector('#nextPage');
        let previousPageLink = document.querySelector('#previousPage');
        // let currentPageLink = document.querySelector('#current');

        if(lastPage > 0) ponditPagination.classList.remove('d-none');

        if(currentPage > 1) previousPageLink.classList.remove('d-none');
        else previousPageLink.classList.add('d-none');

        if(currentPage < lastPage) nextPageLink.classList.remove('d-none');
        else nextPageLink.classList.add('d-none');

        nextPageLink.dataset.next = nextPage;
        previousPageLink.dataset.prev = previousPage;


        let goToNextPage = function(e){
            index(`${url}?page=${this.dataset.next}&${queryString}`);
            // e.stopImmediatePropagation(); // Try to remove me
        };

        nextPageLink.addEventListener('click', goToNextPage);

        let goToPreviousPage = function(e){
            index(`${url}?page=${this.dataset.prev}&${queryString}`);
            // e.stopImmediatePropagation(); // Try to remove me
        };

        previousPageLink.addEventListener('click', goToPreviousPage, false);
    }

    async function paginate() {
        await createListElements();
        await nextAndPrevious();
    }

    paginate();
}    