<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="StacksonStacks">
    <link rel = "stylesheet" type = "text/css" href = "homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Arivl | Home</title>
</head>
<body class=" cyan darken-3">
<?php include "nav-bar.php" ?>

<div class="container">
    <div class="row">
        <div class="col s12 m12 carousel">
            <a class="carousel-item" href="#one!"><img src="images/fulllogo.png"></a>
            <a class="carousel-item" href="#two!"><img src="images/fulllogo.png"></a>
            <a class="carousel-item" href="#three!"><img src="images/fulllogo.png"></a>
            <a class="carousel-item" href="#four!"><img src="images/fulllogo.png"></a>
            <a class="carousel-item" href="#five!"><img src="images/fulllogo.png"></a>
        </div>
    </div>

    <div class="row center white-text">
        <div class="col s12 m4">
            <i class="large material-icons">android</i>
            <p class="flow-text">
                ArivlApp gives access to authorized users at registered boom gates. A user needs to be registered in order to gain access to certain gates. The user logs in using their phone number and password only once. The user needs to enable their bluetooth to ensure that the boom gate opens when in close proximity.
            </p>
        </div>
        <div class="col s12 m4">
            <i class="large material-icons">bluetooth</i>
            <p class="flow-text">
                What the Arivl application entails is the ability to open homes, malls, and work with the swipe on a phone using native mobile technologies like Bluetooth LE. Once Bluetooth is activated or BLE is enabled, your Arivl device will search for the closest boom. On the boom is an ArivlBox and when the phone connects to the box, then the user has to swipe the phone.
            </p>
        </div>
        <div class="col s12 m4">
            <i class="large material-icons">directions_car</i>
            <p class="flow-text">
                Arivl aims to take away the phone interaction. It will also be able to monitor and control building management or other linked IoT devices (such as lights, switches, Air Cons, others as specified, when a person walks past certain areas). It's ability to log the access data also provides for the ability for the admin to do further data analytics with regards to registered users access and exit times.
            </p>
        </div>
    </div>
</div>



<?php include "footer.php" ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.carousel').carousel();

        $('.carousel.carousel-slider').carousel({
            fullWidth: true
        });
    });
</script>
</body>
</html>