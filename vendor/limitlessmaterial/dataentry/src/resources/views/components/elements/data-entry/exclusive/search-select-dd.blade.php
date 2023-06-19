<select class="form-control select-remote-data" id="{{$selectId}}">
    <option selected>select2/select2</option>
</select>

@push('css')

@endpush

@push('js')


    <script>
        (function($){
            $(document).ready(()=>{
                // Initialize
                $('#{{$selectId}}').select2({
                    ajax: {
                        url: "{{$getApi}}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {

                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;

                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 2) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult : (repo)=>{
                        if (repo.loading) return repo.text;
                            var markup = `<div class="select2-result-repository__title" 
                                            value="${repo.email}">
                                            ${repo.email}
                                          </div>`;

                        return markup;
                    }, // omitted for brevity, see the source of this page
                    templateSelection: (repo)=>{
                        return repo.email;
                    } // omitted for brevity, see the source of this page
                });

            
                
            });
        })(jQuery)
    </script>
@endpush
