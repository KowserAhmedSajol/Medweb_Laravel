
@push('js')
    <script src="{{ asset('vendor/limitlessmaterial/global_assets/js/plugins/notifications/noty.min.js') }}"></script>
    <script src="{{ asset('vendor/limitlessmaterial/split/js/flash-message.js') }}"></script>

    @if(session('message'))

        <script>
            (function($) {
                $(document).ready(function() {
                pl_toast('{!! session("message") !!}', 'info')
                });
            })(jQuery)
            
        </script>

    @elseif(session()->has('success'))

        <script>
            (function($) {
                $(document).ready(function() {
                    pl_toast('{!! session("success") !!}', 'success')
                });
            })(jQuery)
            
        </script>

    @elseif(isset($errors) && $errors->any())

        @php
            $error_msg = '';
        @endphp
        @foreach ($errors->all() as $error)
            @php
                $error_msg = "<span>{$error}</span>";
            @endphp
        @endforeach
        <script>

            (function($) {
                $(document).ready(function() {
                    pl_toast('{!! $error_msg !!}', 'danger')
                });
            })(jQuery)

        </script>

    @endif

@endpush
