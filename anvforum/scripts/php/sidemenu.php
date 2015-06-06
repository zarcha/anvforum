<div class="panel panel-default">
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <?php
                session_start();
                if(!isset($_SESSION['user_name']))
                { ?>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="register.php"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
            <?php
                }
                else{ ?>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php } ?>
        </ul>
    </div>
</div>
