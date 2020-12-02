<?php
    require_once('dbConnect.php');
    require_once('user.php');

    $location = array('charbagh' => 0, 'indiranagar' => 10, 'bbd' => 30, 'barabanki' => 60, 'faizabad' => 100, 'basti' => 150, 'gorakhpur' => 210,);

    $pickup = $_POST['pickup'];
    $drop = $_POST['drop'];
    $cabtype = $_POST['cabtype'];
    $luggage = $_POST['luggage'];
    $fare = $_POST['fare'];

    $distance = abs($location[$pickup]-$location[$drop]);

    $_SESSION['ride'] = array("pickup"=>$_POST['pickup'], "drop"=>$_POST['drop'], "luggage"=>$_POST['luggage'], "fare"=>$_POST['fare'], "distance"=> $distance);

    // if(isset($_SESSION['userdata']))
    // {
    //     $dbConnect = new dbConnect();
    //     $user = new user(); 

    //     $user->ride($pickup, $drop, $cabtype, $luggage, $fare, $distance, $dbConnect->connect);
    // }
?>