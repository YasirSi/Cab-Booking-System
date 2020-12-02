<?php
    include('dbConnect.php');
    include('user.php');

    $dbConnect = new dbConnect();
    $user = new user();
?>

<html>
    <head>
        <?php
            if(isset($_SESSION['userdata']['username']))  
            {
                echo "<h3>Hello <b>" .$_SESSION['userdata']['username']. "</b> </h3>";
            }
            else
            {
                echo "<h3>You are not logged In</h3>";
            }
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/infopage.css">
        <link rel="stylesheet" href="css/dashboard.css">
        <!-- ICON -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <title>CedCab</title>
        <script src="cabbook.js"></script>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <!-- Brand -->
                <a href="customerDash.php" class="navbar-brand pl-5"><span class="bg-dark text-white diff">Ced</span><span class="text-white diff">Cab</span></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar_menu">
                    <span class="navbar-toggler-icon"></span>
                </button>     

                <!-- Links -->
                <ul class="navbar-nav">
                
                    <li class="nav-item">
                        <a class="nav-link" href="infopage.php">Account Info</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Rides
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="pendingrides.php">Pending Rides</a>
                            <a class="dropdown-item" href="completedrides.php">Completed Rides</a>
                            <a class="dropdown-item" href="allrides.php">All Rides</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Account
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="update.php">Update Info</a>
                            <!-- <a class="dropdown-item" href="#">Change Password</a> -->
                        </div>
                    </li>

                    <li class="nav-item float-right">
                        <a class="nav-link" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="select mt-5">
            <form action="filter.php" method="POST">
                <center>Filter Value:-
                    <select name="filter" id="filter">
                        <option value="Select Value">Select Value</option>
                        <option value="7">7 days</option>
                        <option value="30">30 days</option>
                        <option value="1">By Fare</option>
                    </select>
                    <input type="submit" value="submit" name="submit" class="submit">
                </center>
            </form>

            <?php
                if (isset($_POST['submit'])) 
                {
                    $filter = isset($_POST['filter'])?$_POST['filter']:'';
                    if($filter==1)
                    {
                        $a='<table><tr><th>Id</th><th>User Name</th><th>Name</th><th>Date Of Signup</th><th>Mobile</th></tr><tr>';
                        $user->filter($a,$filter,$dbConnect->connect);
                    }
                    else
                    {
                        $a='<table><tr><th>Id</th><th>User Name</th><th>Name</th><th>Date Of Signup</th><th>Mobile</th></tr><tr>';
                        $user->filter($a,$filter,$dbConnect->connect);
                    }
                }
            ?>
        </div>              
    </body>
</html>