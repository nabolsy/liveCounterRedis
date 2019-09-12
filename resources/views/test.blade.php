@extends('master')

@section('content')
    <p id="power">0</p>
@stop

@section('footer')
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.dev.js"></script>
    <script>
        var socket = io('http://localhost:3000');
        //var socket = io('http://192.168.10.10:3000');
        socket.on("test-channel:App\\Events\\EventName", function(message){
            // increase the power everytime we load test route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
@stop