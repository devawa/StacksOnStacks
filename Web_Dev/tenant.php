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
    <title>Arivl | Tenant</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            background: url(images/tenant.jpg) 50% 50% no-repeat;
            background-size: cover;
            display: table;
        }

        .card {
            padding: 3em;
        }
    </style>
</head>
<body class=" cyan darken-3">
<?php $page = 'tenant'; include "nav-bar.php" ?>

<div class="container">
    <div class="row">
        <div class="col s12 m5">
            <?php include "loginForm.php"; ?>
        </div>
        <div class="col s12 m6 offset-m1">
            <h4 class="white-text">Tenant Login</h4>
            <p class="flow-text white-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, ab? Nostrum cumque ratione, obcaecati, voluptatem id molestiae hic corrupti quis, earum at debitis neque ea! Veniam expedita praesentium atque exercitationem.
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
        $('.slider').slider();
        $('.parallax').parallax();
        $('.tabs').tabs();
    });
</script>
</body>
</html>