<!DOCTYPE html>
<html>
<head>
    <title>Stream</title>
</head>
<body>
    <h1>Live Stream</h1>
    <video id="liveStream" controls autoplay></video>

    <script>
        const accessToken = '{{ $accessToken }}';
        const url = `wss://streaming.api.restream.io/ws?accessToken=${accessToken}`;
        const connection = new WebSocket(url);

        connection.onmessage = (message) => {
            const update = JSON.parse(message.data);
            console.log(update);

            // Assuming the update contains a URL to the live stream
            const videoElement = document.getElementById('liveStream');
            videoElement.src = update.streamUrl; // Adjust this based on the actual data structure
        };

        connection.onerror = console.error;
    </script>
</body>
</html>