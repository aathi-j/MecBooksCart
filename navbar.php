<nav class="navbar navbar-inverse">        
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="logo.png" width="55" height="23" alt="logo.png" class="pull-left" >Book Exchange Website</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
<?php
        if(isset($_SESSION['username']))
        {
?>
            <ul class="nav navbar-nav">
                <li><a href="bs.php"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="about.php"><span class="glyphicon glyphicon-sunglasses"></span> About Us </a></li>
                <li><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="buy.php"><span class="glyphicon glyphicon-shopping-cart"></span> Buy </a></li>
                <li><a href="sell.php"><span class="glyphicon glyphicon-book"></span> Sell </a></li>
                <li><a href="sell_list.php"><span class="glyphicon glyphicon-list-alt"></span> My Sell List </a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-cog"></span> Settings <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="change_pwd.php"> Change Password </a></li>
                        <li><a href="edit_profile.php"> Edit Profile </a></li>
                    </ul>
                </li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
            </ul>
<?php
        }
        else
        {
?>
            <ul class="nav navbar-nav">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home </a></li>
                <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us </a></li>
                <li><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up </a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
            </ul>
<?php
        }
?>          
    </div>        
</nav> 