@if($cPage && $pNumber)
    <nav aria-label="Page navigation" class="text-uppercase" id="ponditPagination">
        <div class="row">
            <div class="col-6">
                <div>{{__("Page:")}} <span class="badge bg-info current-page-number">0</span> of <span class="badge bg-info total-page-number">0</span> {{__("Records:") }}  <span class="badge bg-info total-record-number">0</span></div>
            </div>
            <div class="col-6 text-end">
                <ul class="pagination float-end" id="pagesList"></ul>
            </div>
        </div>
    </nav>
@else
    @if($cPage)
    <nav aria-label="Page navigation" class="text-uppercase" id="ponditPagination">
        <div class="row">
            <div class="col-12">
                <div>{{__("Page:")}} <span class="badge bg-info current-page-number">0</span> of <span class="badge bg-info total-page-number">0</span> {{__("Records:") }}  <span class="badge bg-info total-record-number">0</span></div>
            </div>
        </div>
    </nav> 
    @else
        <nav aria-label="Page navigation" class="text-uppercase" id="ponditPagination">
            <div class="row">
                <div class="col-12 text-end">
                    <ul class="pagination float-end" id="pagesList"></ul>
                </div>
            </div>
        </nav>
    @endif
@endif

