<?php  
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .recorded-video{ align-items:center; text-align:center  }
    .buttons{display:flex; flex-direction:row; text-align:center;  gap: 20px; }
    .eachbutton:hover{
        background-color: #017603 ;
        
    }
    .eachbutton{
        border-radius:10px; background-color: #04AA6D; color:white; border-color:#04AA6D; padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>
<head>
    <meta charset="UTF-8">
    <title>Record Video</title>
    <script>
        let mediaRecorder;
        let recordedBlobs;

        function startRecording() {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    let video = document.getElementById('recorded-video');
                    video.srcObject = stream;
                    video.play();

                    recordedBlobs = [];
                    mediaRecorder = new MediaRecorder(stream, { mimeType: 'video/webm' });

                    mediaRecorder.ondataavailable = (event) => {
                        if (event.data && event.data.size > 0) {
                            recordedBlobs.push(event.data);
                        }
                    };

                    mediaRecorder.start();
                })
                .catch(function(error) {
                    console.error('Error accessing the camera:', error);
                });
        }

        function stopRecording() {
            mediaRecorder.stop();
            let video = document.getElementById('recorded-video');
            let stream = video.srcObject;
            let tracks = stream.getTracks();

            tracks.forEach(function(track) {
                track.stop();
            });

            video.srcObject = null;
        }

        function sendVideoToFlask() {
            let blob = new Blob(recordedBlobs, { type: 'video/webm' });
            let formData = new FormData();
            formData.append('video', blob, 'recorded_video.webm');  // Ensure blob is appended correctly

            fetch('http://localhost:5000/process_video', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Planting action detected!') {
                    window.location.href = 'issue_coupon.php';
                } else if (data.message === 'No planting action detected.') {
                    window.location.href = 'no_action_detected.php';
                } else {
                    document.getElementById('response-message').innerText = data.message;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</head>
<body>
    <h2 style="text-align:center">Record Video</h2>
    <div>
        <video id="recorded-video" width="640" height="480" autoplay></video>
    </div>
    <div class="buttons">
        <br><br>
        <button onclick="startRecording()" class="eachbutton">Start Recording</button><br>
        <button onclick="stopRecording()" class="eachbutton" >Stop Recording</button><br>
        <button onclick="sendVideoToFlask()" class="eachbutton" >Upload</button>
    </div>
    <div>
        <p id="response-message"></p>
        
    </div>
</body>
</html>
