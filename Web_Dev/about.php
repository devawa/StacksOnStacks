<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="StacksonStacks">
    <link rel="icon" href="images/logo.png">
    <link rel = "stylesheet" type = "text/css" href = "homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Arivl | About</title>
</head>
<body class=" cyan darken-3">
<?php $page = 'about'; include "nav-bar.php" ?>

<div class="container ">
    <div class="row about">
        <div class="col s12 m12">
            <h1 class="white-text line anim-typewriter">About Arivl Seamless Access Control</h1>
        </div>
        <div class="col s12 m12 white-text">
            <h3>What is Arivl?</h3>
            <p class="flow-text">
                Arivl is a access control system that allows users and admin to control and monitor the access of connected gates seamlessly. What the Arivl application entails is the ability to open homes, malls, and work with the swipe on a phone using native mobile technologies like Bluetooth LE. Once Bluetooth is activated or BLE is enabled, your Arivl device will search for the closest boom. On the boom is an ArivlBox and when the phone connects to the box, then the user has to swipe the phone.
            </p>
        </div>
    </div>
</div>

<div class="parallax-container">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 right-align">
                <h3 class="white-text">What is Arivls Purpose?</h3>
                <p class="flow-text white-text">
                    Arivl aims to take away the phone interaction. It will also be able to monitor and control building management or other linked IoT devices (such as lights, switches, Air Cons, others as specified, when a person walks past certain areas). It's ability to log the access data also provides for the ability for the admin to do further data analytics with regards to registered users access and exit times.
                </p>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="images/seven.jpg" class="slider-img"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <h3 class="white-text">Who are we?</h3>
            <p class="flow-text white-text">
                We are a team of aspiring Software Engineers currently studying our final year at the University of Pretoria in BSc IT and BSc CS who have been tasked with the project of building the project Arivl as a requirement of completing our Software Engineering module courtesy of UnitX.
            </p>
        </div>
    </div>
</div>

<div class="parallax-container">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 right-align">
                <h4 class="white-text">Have a look at our documentation</h4>
                <div class="right">
                    <ul class="browser-default offset-m6">
                        <p><a href="https://stacksonstacks301.slack.com/" target="_blank" class="white-text flow-text"><i class="fab fa-slack-hash"></i> Slack</a></p>
                        <p><a href="https://github.com/devawa/StacksOnStacks" target="_blank" class="white-text flow-text"><i class="fab fa-github"></i> GitHub</a></p>
                        <p><a href="https://waffle.io/devawa/StacksOnStacks" target="_blank" class="white-text flow-text"><i class="fas fa-stroopwafel"></i> Waffle</a></p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="images/six.jpg" class="slider-img"></div>
</div>

<?php include "footer.php" ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.carousel').carousel();
        $('.slider').slider();
        $('.parallax').parallax();

    });
</script>
</body>
</html>