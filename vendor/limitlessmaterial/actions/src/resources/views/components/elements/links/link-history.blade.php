<button type="button" class="btn btn-sm bg-teal border-2 border-teal btn-icon rounded-round legitRipple shadow mr-1" data-toggle="modal"
    data-target="#modal_history_onshown_{{ $data['unique_identifier'] }}">
    <i class="icon-history"></i>
</button>

<!-- onShown callback modal -->
<div id="modal_history_onshown_{{ $data['unique_identifier'] }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">History</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="modal_body_{{ $data['unique_identifier'] }}">


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- /onShown callback modal -->
@push('js')
    {{-- pagespecific-js --}}
    <script>
        // onShown callback
        $("#modal_history_onshown_{{ $data['unique_identifier'] }}").on('shown.bs.modal', function() {
            async function fetchHistoriesJSON() {
                const response = await fetch("{{ $data['api_end_point'] }}");
                const histories = await response.json();
                return histories;
            }
            fetchHistoriesJSON().then(histories => {
                console.log(histories)
                document.getElementById("modal_body_{{ $data['unique_identifier'] }}").innerHTML = 'zdfvsdf'
            });
        });
    </script>
@endpush
