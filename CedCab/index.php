<?php
    session_start();

    if(isset($_SESSION['userdata']['username']))
    {
        header("Location: customerDash.php");
    }
    if(isset($_SESSION['userdata']['isadmin']) == 1)
    {
        header("Location: login.php");
    }
?>

<html>
    <head>
        <?php
            if(isset($_SESSION['userdata']['username']))  
            {
                echo "<h3>Hello <b>" .$_SESSION['userdata']['username']. "</b> </h3> Click here to <a href='logout.php'> Logout</a>";
            }
            else
            {
                echo '<script>alert("Please LogIn!")</script>';
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
        <link rel="stylesheet" href="css/dashboard.css">
        <!-- ICON -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <title>CedCab</title>
        <script src="cabbook.js"></script>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 ">
            <a href="#" class="navbar-brand pl-5"><span class="text-white diff">Ced Cab</span></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar_menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar_menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="signup.php" class="nav-link">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a href="review.php" class="nav-link">Enquiry</a>
                    </li>
                </ul>
            </div>     
            </nav>
        </header>
        <div class="pic row ml-0">
            <div class="container">
                <h1 class="font-weight-bold pt-5 text-white text-center"> Book a Taxi in Your Destination in Your Town</h1>
                <h3 class="text-white text-center">Choose from a range of catagaries and prices</h3>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-4 col-lg-4">
                <form class="bg-white p-1" action="tobook.php" method="POST">
                    <div class="content">
                        <p class="text-center"><span class="taxi mt-3">CITY TAXI</span></p>
                        <hr>
                        <h5 class="pt-1 text-center"><b>Your everyday travel partner</b></h5>
                        <p class="text-center">AC cabs for point to point travel</p>
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text text_size" for="inputGroupSelect01">PICKUP</label>
                        </div>
                        <select name="pickup" class="custom-select nosamelocation" id="current-location">
                            <option selected disabled>Current-location</option>
                            <option value="charbagh">Charbagh</option>
                            <option value="indiranagar">Indira Nagar</option>
                            <option value="bbd">BBD</option>
                            <option value="barabanki">Barabanki</option>
                            <option value="faizabad">Faizabad</option>
                            <option value="basti">Basti</option>
                            <option value="gorakhpur">Gorakhpur</option>
                        </select>
                    </div>
                    <p id="pickmsg" class="msgstyle">Enter Pickup</p>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text text_size" for="inputGroupSelect01">DROP</label>
                        </div>
                        <select  name="drop" class="custom-select nosamelocation" id="drop-location">
                        <option selected disabled>Enter Drop for ride estimate</option>
                            <option value="charbagh">Charbagh</option>
                            <option value="indiranagar">Indira Nagar</option>
                            <option value="bbd">BBD</option>
                            <option value="barabanki">Barabanki</option>
                            <option value="faizabad">Faizabad</option>
                            <option value="basti">Basti</option>
                            <option value="gorakhpur">Gorakhpur</option>
                        </select>
                    </div>
                    <p id="dropmsg" class="msgstyle">Enter Destination </p>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text text_size" for="inputGroupSelect01">CAB TYPE</label>
                        </div>
                        <select name="cab" class="custom-select" id="selectcartype" onchange="cartype()">
                            <option selected disabled>Select-Cab-Type</option>
                            <option value="cedmicro">CedMicro</option>
                            <option value="cedmini">CedMini</option>
                            <option value="cedsuv">CedSuv</option>
                            <option value="cedroyal">CedRoyal</option>
                        </select>
                    </div>
                    <p id="cartypemsg" class="msgstyle">Enter CarType </p>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text text_size">Luggage</span>
                        </div>
                        <input name="luggage" onkeypress="return onlynumber(event)" type="text" class="form-control" id="luggage" placeholder="Enter Weight In KG" >
                    </div>
                    <p id="luggagemsgintonly" class="msgstyle">Enter detail && Number allowed only</p>
                    <input type="hidden" id="fare" name="fare">
                    <input type="hidden" id="distanceid" name="distanceid">

                    <div class="input-group mb-2">
                        <div class="input-group-prepend"></div>
                        <input type="button" class="form-control" id="calculate-fare" value="Evaluate">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend"></div>
                        <!-- <a class="form-control" id="book-now" class="form-control"  id="book-now" >Book Now</a> -->
                        <input type="submit" id="book-now" class="form-control" name="book" id="book-now" value="Book Now">
                    </div>

                    <div class="input-group mb-2 mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Total Distance</span>
                            <div id="distance" class="form-control"></div>
                            <span class="input-group-text">Total Fare</span>
                            <div id="display" class="form-control"></div>
                        </div>
                    </div>

                    <!-- <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Total Fare</span>
                            <div id="display" class="form-control"></div>
                        </div>
                    </div> -->
                </form>
                <br>
                <br>
                <br>
            </div>
        </div>

        <div class="container mt-2">
            <div class="row">
                <div class="col-sm-4">
                    <i class="fab fa-facebook-f" style="font-size:20px; color:black"></i>
                    <i class="fab fa-twitter" aria-hidden="true" style="font-size:20px; color:black; margin-left: 5px;"></i>
                    <i class="fab fa-instagram" aria-hidden="true" style="font-size:20px; color:black; margin-left: 5px;"></i>
                </div>

                <div class="col-sm-4 text-center">
                    <span class="text-danger">CED CAB</span>
                </div>

                <!-- <div class="col-sm-4 btn-group btn-group-sm">
                    <button class="btn btn-link">FEATURES</button>
                    <button class="btn btn-link">REVIEWS</button>
                    <button class="btn btn-link">SIGNUP</button>
                </div> -->
            </div>
        </div>

        <!-- AJAX CODE -->
        <script>
            $(document).ready(function() 
            {
                $('#pickmsg').hide();
                $('#dropmsg').hide();
                $('#cartypemsg').hide();
                $('#luggagemsgintonly').hide();
                $('#book-now').hide();
            
                $('#calculate-fare').click(function() 
                {
                    $('#pickmsg').hide();
                    $('#dropmsg').hide();
                    $('#cartypemsg').hide();
                    $('#luggagemsgintonly').hide();
                
                    var pickup = $('#current-location').val();
                    var drop = $('#drop-location').val();
                    var cabtype = $('#selectcartype').val();
                    var luggage = $('#luggage').val();

                    if (pickup == null || drop == null || cabtype == null || luggage == null) 
                    {
                        if(pickup == null) 
                        {
                            $('#pickmsg').show();
                        }
                        if(drop == null)
                        {
                            $('#dropmsg').show();
                        }
                        if(cabtype == null)
                        {
                            $('#cartypemsg').show();
                        }
                        if(luggage == "")
                        {
                            $('#luggagemsgintonly').show();
                        }
                    } 
                    else
                    {
                        $.ajax
                        ({
                            url: 'cabbook.php',
                            type: 'POST',
                            data: {
                                pickup: pickup,
                                drop: drop,
                                cabtype: cabtype,
                                luggage: luggage
                            },
                            success: function(msg) {
                                var path=msg;
                                path=msg.split(',');
                                console.log(path);
                                $('#distance').html(path[0]);

                                $('#distanceid').val(path[0]);
                                $('#fare').val(path[1]);

                                $('#display').html(path[1]);

                                $('#calculate-fare').hide();
                                $('#book-now').show();
                                $('#fare').val(path[1]);
                            },
                            error: function(error) {
                                alert(error);
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>