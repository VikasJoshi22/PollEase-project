<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/submitted.css">
    <title>Document</title>
</head>
<body onload="timer()">
    <div class="submitted">
        <h1>Your responce has been submitted</h1>
        <h3>Thanks for your valuable vote</h3>
        <div id="safeTimer">
            <p id="safeTimerDisplay"></p>
        </div>
    </div>

    <script>
        function timer(){
            var sec = 4;
            var timer = setInterval(function(){
                document.getElementById('safeTimerDisplay').innerHTML='You will be redirected to Home page in '+sec+'second(s)';
                sec--;
                if (sec < 0) {
                    clearInterval(timer);
                }
            }, 1000);

            
        }
</script>
</body>
</html>

<?php
    header('Refresh: 5; URL=home.php');
?>