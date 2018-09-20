<div class="navbar-fixed">
<nav class="cyan darken-4">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo center"><img src="images/logo.png" height="50px" width="50px" alt=""><span class="hide-on-small-only"> &nbsp;Seamless Access Control<span></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="left hide-on-med-and-down">
        <li class="<?php if ($page == 'index'){echo 'active';}?>"><a class="waves-effect waves-light " href="index.php">Home</a></li>
        <li class="<?php if ($page == 'about'){echo 'active';}?>"><a class="waves-effect waves-light " href="about.php">About</a></li>
        <li class="<?php if ($page == 'team'){echo 'active';}?>"><a class="waves-effect waves-light " href="team.php">Team</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-light " href="tenant.php">Logout</a></li>
      </ul>
    </div>

</nav>
</div>

  <ul class="sidenav cyan darken-4" id="mobile-demo">
        <li class="<?php if ($page == 'index'){echo 'active';}?>"><a class="waves-effect waves-light white-text flow-text" href="index.php">Home</a></li>
        <li class="<?php if ($page == 'about'){echo 'active';}?>"><a class="waves-effect waves-light white-text flow-text" href="about.php">About</a></li>
        <li class="<?php if ($page == 'team'){echo 'active';}?>"><a class="waves-effect waves-light white-text flow-text" href="team.php">Team</a></li>
        <li class="<?php if ($page == 'home'){echo 'active';}?>"><a class="waves-effect waves-light white-text flow-text" href="tenant.php">Logout</a></li>
  </ul>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
        
  });
</script>