<?php
    require_once('dbConnect.php');
    require_once('user.php');

    $location = array('charbagh' => 0, 'indiranagar' => 10, 'bbd' => 30, 'barabanki' => 60, 'faizabad' => 100, 'basti' => 150, 'gorakhpur' => 210,);

    $pickup = $_POST['pickup'];
    $drop = $_POST['drop'];
    $cabtype = $_POST['cabtype'];
    $luggage = $_POST['luggage'];

    // $store_pickup = $location[$pickup];
    // $store_drop = $location[$drop];

    // $distance = abs($store_pickup-$store_drop);
    // $fare = abs($fare);

    $distance = abs($location[$pickup]-$location[$drop]);
    echo $distance;

    if($luggage != NULL)
    {
        if($luggage <=10)
        {
            $weight = 50;
        }
        elseif($luggage<=20)
        {
            $weight = 100;
        }
        elseif($luggage>20)
        {
            $weight = 200;
        }
    }
    else
    {
        $weight = 0;
    }
    
    $fare = 0;
    if($cabtype == 'cedmicro')
    {
        if($distance <= 10)
        {
          $fare = ($distance * 13.50) + 50;
          echo (',');
          echo $fare;
        }
        
        elseif($distance <=60)
        {
            $ten = 10 * 13.50;
            $rest = ($distance-10) * 12.00;
            $fare = $ten + $rest + 50;
            echo (',');
            echo $fare; 
        }

        elseif($distance <=160)
        {
            $ten = 10 * 13.50;
            $fifty = 50 * 12.00;
            $rest = ($distance - 60) * 10.20;
            $fare = $ten + $fifty + $rest + 50;
            echo (',');
            echo $fare;
        }

        elseif($distance >160)
        {
            $ten = 10 * 13.50;
            $fifty = 50 * 12.00;
            $hundred = 100 * 10.20;
            $rest = ($distance - 160) * 8.50;
            $fare = $ten + $fifty + $hundred + $rest + 50;
            echo (',');
            echo $fare; 
        }
    }

    elseif($cabtype == 'cedmini')
    {
        if($distance <= 10)
        {
          $fare = ($distance * 14.50) + $weight + 150;
          echo (',');
          echo $fare;
        }
        
        elseif($distance <=60)
        {
            $ten = 10 * 14.50;
            $rest = ($distance-10) * 13.00;
            $fare = $ten + $rest + $weight + 150;
            echo (',');
            echo $fare;
        }

        elseif($distance <=160)
        {
            $ten = 10 * 14.50;
            $fifty = 50 * 13.00;
            $rest = ($distance - 60) * 11.20;
            $fare = $ten + $fifty + $rest + $weight + 150;
            echo (',');
            echo $fare;
        }

        elseif($distance >160)
        {
            $ten = 10 * 14.50;
            $fifty = 50 * 13.00;
            $hundred = 100 * 11.20;
            $rest = ($distance - 160) * 9.50;
            $fare = $ten + $fifty + $hundred + $rest + $weight + 150;
            echo (',');
            echo $fare;
        }
    }

    elseif($cabtype == 'cedroyal')
    {
        if($distance <= 10)
        {
          $fare = ($distance * 15.50) + $weight + 200;
          echo (',');
          echo $fare;
        }
        
        elseif($distance <=60)
        {
            $ten = 10 * 15.50;
            $rest = ($distance-10) * 14.00;
            $fare = $ten + $rest + $weight + 200;
            echo (',');
            echo $fare;
        }

        elseif($distance <=160)
        {
            $ten = 10 * 15.50;
            $fifty = 50 * 14.00;
            $rest = ($distance - 60) * 12.20;
            $fare = $ten + $fifty + $rest + $weight + 200;
            echo (',');
            echo $fare;
        }

        elseif($distance >160)
        {
            $ten = 10 * 15.50;
            $fifty = 50 * 14.00;
            $hundred = 100 * 12.20;
            $rest = ($distance - 160) * 10.50;
            $fare = $ten + $fifty + $hundred + $rest + $weight + 200;
            echo (',');
            echo $fare;
        }
    }

    elseif($cabtype == 'cedsuv')
    {
        if($distance <= 10)
        {
          $fare = ($distance * 16.50) + (2 * $weight) + 250;
          echo (',');
          echo $fare;
        }
        
        elseif($distance <=60)
        {
            $ten = 10 * 16.50;
            $rest = ($distance-10) * 15.00;
            $fare = $ten + $rest + (2 * $weight) + 250;
            echo (',');
            echo $fare;
        }

        elseif($distance <=160)
        {
            $ten = 10 * 16.50;
            $fifty = 50 * 15.00;
            $rest = ($distance - 60) * 13.20;
            $fare = $ten + $fifty + $rest + (2 * $weight) + 250;
            echo (',');
            echo $fare;
        }

        elseif($distance >160)
        {
            $ten = 10 * 16.50;
            $fifty = 50 * 15.00;
            $hundred = 100 * 13.20;
            $rest = ($distance - 160) * 11.50;
            $fare = $ten + $fifty + $hundred + $rest + (2 * $weight) + 250;
            echo (',');
            echo $fare;
        }
    }

    // $_SESSION['ride']['fare'] = $fare;
    // $dbConnect = new dbConnect();
    // $user = new user(); 
    // $user->ride($dbConnect->connect);

    // if(isset($_SESSION['userdata']))
    // {
    //     $dbConnect = new dbConnect();
    //     $user = new user(); 

    //     $user->ride($dbConnect->connect);
    // }
?>