@props(['status' => 'info'])

@php
    $error = '';
    if(session('msg_danger') ){$error = 'flash-message-error';}
@endphp

@if(session('msg_success') || session('msg_danger'))
    <div id='flash-message' class='flash-message {{ $error }}' style='display:none;' >
        {{ session('msg_success') }}
        {{ session('msg_danger') }}
        <div class='flash-message-close' >×</div>
    </div>

    <script>

        $('#flash-message').fadeIn( 1000 );

        $('.flash-message-close').on('click', function() {
            $('#flash-message').fadeOut( 500 );
        });

    </script>
@endif

