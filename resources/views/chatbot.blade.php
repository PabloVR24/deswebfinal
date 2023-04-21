@extends('users.navbar')

@section('contenido')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid m-0 d-flex p-2">
        <div class="p1-2">
            <i class="fa fa-angle-double left"></i>
        </div>
        <div style="width: 50px; height: 50px;">
            <img src="data:image/png;base64,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"
                height="100%" width="100%" style="border-radius: 50px">
        </div>
        <div class="font-weight-bold m1-2 mt-2">
            Chatbot
        </div>
    </div>
    <div class="" style="background: #06112B; height: 2px;"></div>
    <div class="container-fluid p-2" style="height: calc(100vh - 130px); overflow-y: scroll;" id="content-box">

    </div>
    <div class="container-fluid w-100 px-3 py-2 d-flex" style="background: #131f45; height: 62px;">
        <div class="mr-2 p1-2" style="background: #ffffff1c; width: calc(100% - 45px); border-radius: 5px;">
            <input type="text" id="input" name="input" class="text-white"
                style="background: none; width: 100%; height: 100%; border:0, outline:none;">
        </div>
        <div class="text-center" id="button-submit"
            style="background: #4acfee; height: 100%; width: 50px; border-radius: 5px;">
            <i class="fa fa-paper-plane text-white" aria-hidden="true"; style="line-height: 45px;"></i>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $("#button-submit").on('click', function() {
            $value = $('#input').val();
            $("#content-box").append(
                '<div class="mb-2"> <div class="float-right px-3 py-2" style="width: 270px; background: #4acfee; border-radius: 10px; float: right; font-size: 85%;"> ' +
                $value + ' </div><div style="clear:both"></div></div>'
            )

            $.ajax({
                type: 'post',
                url: '{{ url('send') }}',
                data: {
                    'input': $value
                },
                success: function(data) {
                    $('#content-box').append(
                        '<div class="d-flex mb-2"><div class="mr-2" style="width: 45px; height: 45px;"> <img src="images/chatbot.png" width="100%" style="border-radius: 50px"></div><div class="py-2 px-3 text-white" style="width: 270px; background: #13254b; border-radius: 10px">' +
                        $data + '</div></div>'
                    );
                    $value = $('#input').val('');
                }
            })
        })
    </script>
@endsection
