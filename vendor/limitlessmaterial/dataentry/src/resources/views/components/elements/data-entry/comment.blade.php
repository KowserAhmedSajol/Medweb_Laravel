<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Comment
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content comment-section">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="">
            <input type="hidden" class="scopeableId"    value="{{$scopes['scopeableId']}}">
            <input type="hidden" class="scopeableUuid"  value="{{array_key_exists('scopeableUuid',$scopes) ? $scopes['scopeableUuid'] : ''}}">
            <input type="hidden" class="scopeableType"  value="{{$scopes['scopeableType']}}">
            <input type="hidden" class="userEmail"      value="{{auth()->user()->email}}">
            <input type="hidden" class="userId"         value="{{auth()->user()->id}}">

            <x-sg-text type="text" class="comment" :value="old('comment')" placeholder="Please write down your feedback" :config="['label'=>['text'=>'Comment']]" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save-comment-btn">Save Comment</button>
      </div>
    </div>
  </div>
</div>

@push('js')
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <script>
        (function($){
            $(document).ready(()=>{
                $(document).on('click','.save-comment-btn', function(event){
                    let
                        el = event.target,
                        commentSection = $(el).closest('.comment-section');
                    let data = {};

                    data.scopeableId    = $(commentSection).find('.scopeableId').val();
                    data.scopeableUuid  = $(commentSection).find('.scopeableUuid').val();
                    data.scopeableType  = $(commentSection).find('.scopeableType').val();
                    data.userEamil      = $(commentSection).find('.userEmail').val();
                    data.userId         = $(commentSection).find('.userId').val();
                    data.comment        = $(commentSection).find('.comment').val();

                    console.log(data);
                });

                
            });
        })(jQuery)

    </script>
@endpush