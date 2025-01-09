<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Chat</title>

    <!-- Use the latest Pusher CDN -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="/style.css">
</head>
<body>

<div class="chat">

    <div class="top">
        <img src="http://assets.edlin.app/images/ressedlin/03/rossedlin-03-100.jpg" alt="Avatar">
        <div>
            <p>Ross Edilin</p>
            <small>Online</small>
        </div>
    </div>

    <!-- Display received messages -->
    <div class="message" id="messages-container">
        @include('receive', ['message' => "Hey! What's up! 👋"])
    </div>

    <!-- Message input form -->
    <div class="bottom">
        <form id="chat-form">
            @csrf
            <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
            <button type="submit">Send</button>
        </form>
    </div>

</div>

<script>
    // Pusher setup
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}'
    });

    const channel = pusher.subscribe('chat-channel'); // Ensure this matches your event's broadcastOn() channel name

    // Receive messages
    channel.bind('App\\Events\\NewMessage', function(data) {
        // Append new messages to the messages container
        $.post("/receive", {
            _token: '{{ csrf_token() }}',
            message: data.message,
        })
        .done(function(res) {
            $("#messages-container").append(res);
            $(document).scrollTop($(document).height());
        });
    });

    // Broadcast messages
    $("#chat-form").submit(function(event) {
        event.preventDefault(); // Prevent form submission

        const message = $("#message").val();

        $.ajax({
            url: "/broadcast",
            method: 'POST',
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            },
            data: {
                _token: '{{ csrf_token() }}',
                message: message,
            }
        }).done(function(res) {
            // Clear the message input and append the new message
            $("#message").val('');
            $("#messages-container").append(res);
            $(document).scrollTop($(document).height());
        });
    });
</script>

</body>
</html>
