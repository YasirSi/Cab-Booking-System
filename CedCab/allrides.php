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
            <?php
                echo'<h2 class="h2 text-center">Your Rides With Us Till Now</h2>';
                echo'<table id="table" class="mt-5">
                <tr>
                    <th>Ride Id</th>
                    <th>Ride Date</th>
                    <th>Pickup</th>
                    <th>Destination</th>
                    <th>Total Distance</th>
                    <th>Luggage</th>
                    <th>Total Fare</th>
                </tr>';

                $dbConnect = new dbConnect();
                $x = $_SESSION['userdata']['userid'];
                
                $query = mysqli_query($dbConnect->connect, "SELECT * FROM tbl_ride WHERE user_id =$x ");
                while($row = mysqli_fetch_array($query))
                {
                    echo "<tr>";
                        echo "<td>" . $row['ride_id'] . "</td>";
                        echo "<td>" . $row['ride_date'] . "</td>";
                        echo "<td>" . $row['pickup'] . "</td>";
                        echo "<td>" . $row['destination'] . "</td>";
                        echo "<td>" . $row['total_distance'] . "</td>";
                        echo "<td>" . $row['luggage'] . "</td>";
                        echo "<td>" . $row['total_fare'] . "</td>";
                    echo "</tr>";
                }
                echo '</table>';
            ?>
            <link rel='stylesheet' href='css/allrides.css'>
            <br>
            <br>
            <h4><a href='customerDash.php' style=" margin-left: 25%;">Go Back</a></h4>
        </div>              
    </body>
</html>