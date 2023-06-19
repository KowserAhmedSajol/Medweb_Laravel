<!-- <select class="form-control select-remote-data" id="{{$selectId}}" data-focus>
    <option selected>select2/select2</option>
</select> -->
<div class="search-section">
    <input type="text" name="{{$name}}" id="{{$selectId}}" placeholder="{{$placeholder}}" autocomplete="off" class="form-control shadow"/>
    <div class="suggestions pt-2 bg-white" style="position:absolute; z-index:999; box-sizing:border-box"></div>
</div>


@push('css')

@endpush

@push('js')


    <script>
        (function($){
            $(document).ready(()=>{
                // Initialize
                // $('#{{$selectId}}').select2({
                //     ajax: {
                //         url: "{{$getApi}}",
                //         dataType: 'json',
                //         delay: 250,
                //         data: function (params) {
                //             return {
                //                 q: params.term, // search term
                //                 page: params.page
                //             };
                //         },
                //         processResults: function (data, params) {

                //             // parse the results into the format expected by Select2
                //             // since we are using custom formatting functions we do not need to
                //             // alter the remote JSON data, except to indicate that infinite
                //             // scrolling can be used
                //             params.page = params.page || 1;

                //             return {
                //                 results: data.items,
                //                 pagination: {
                //                     more: (params.page * 2) < data.total_count
                //                 }
                //             };
                //         },
                //         cache: true
                //     },
                //     escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                //     minimumInputLength: 1,
                //     templateResult : (repo)=>{
                //         if (repo.loading) return repo.text;
                //             var markup = `<div class="select2-result-repository__title">
                //                             ${repo.phone}
                //                           </div>`;

                //         return markup;
                //     }, // omitted for brevity, see the source of this page
                //     templateSelection: (repo)=>{
                //         return repo.phone;
                //     } // omitted for brevity, see the source of this page
                // });

                $('#{{$selectId}}').keyup(function(evnet){
                    let el          = event.target,
                        recordId    = "{{$recordId}}",
                        recordText  = "{{$recordText}}";

                        console.log(recordId);

                    $.ajax({
                        url: "{{$getApi}}",
                        dataType: 'json',
                        delay: 250,
                        data: { 'q' : $(el).val()},
                        success(res){
                            let bodyItems = '';

                            $.each(res.items,function(i,val){
                                bodyItems += `<h6 class="bg-white shadow p-1 rounded cursor-pointer w-100 suggested-num" data-recordid="${val[recordId]}">${val[recordText]}</h6>`
                            });

                            let searchSection = $(el).closest('.search-section')
                            $(searchSection).find('.suggestions').html(bodyItems);
                            console.log(bodyItems);

                            // $('#call-for-appointment').html(bodyItmes);

                        },
                        error(err){
                            console.log(err.statusText);
                            let searchSection = $(el).closest('.search-section')
                            $(searchSection).find('.suggestions').html('');
                            
                        }
                    })
                });


                $(document).on('click','.suggested-num',function(evnet){
                    let el = event.target;

                    let searchSection = $(el).closest('.search-section')
                    $(searchSection).find('input').val($(el).data('recordid'));
                    $(searchSection).find('.suggestions').html('');

                });
                
            });
        })(jQuery)
    </script>
@endpush