<?php
    include('dbConnect.php');
    include('user.php');

    $dbConnect = new dbConnect();

    if(isset($_POST['update']))
    {
        $username = isset($_POST['username']) ? ($_POST['username']) : "";
        $name = isset($_POST['name']) ? ($_POST['name']) : "";
        $mobile = isset($_POST['mobile']) ? ($_POST['mobile']) : "";
        $password = isset($_POST['password']) ? ($_POST['password']) : "";
        $repassword = isset($_POST['repassword']) ? ($_POST['repassword']) : "";
        // echo $username ,$name, $mobile, $password, $repassword;

        $user = new user();
        
        $sql = $user->update($username, $name, $mobile, $password, $repassword, $dbConnect->connect);
    }
    elseif(isset($_POST['back']))
    {   
        header('Location:customerDash.php');
    }  
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/signup.css">
        <title>
            Update Info
        </title>
    </head>

    <body>
        <div class="container">
            <h1 class="heading">Update Details</h1>
        
            <form action="" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="username">User Name</label>
                    </div>

                    <div class="col-75">
                        <input type="text" name="username" placeholder="You Cant change the username..!!" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="name">Name</label>
                    </div>

                    <div class="col-75">
                        <input type="text" id="name" name="name" placeholder="Enter Name.." value="<?php echo $_SESSION['userdata']['name']?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="mobile">Mobile</label>
                    </div>

                    <div class="col-75">
                        <input type="number" id="mobile" name="mobile" placeholder="Enter Mobile Number.." value="<?php echo $_SESSION['userdata']['mobile']?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="password">Password</label>
                    </div>

                    <div class="col-75">
                        <input type="password" id="password" name="password" placeholder="Enter Password.." value="<?php echo $_SESSION['userdata']['password']?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="password">RePassword</label>
                    </div>

                    <div class="col-75">
                        <input type="password" id="repassword" name="repassword" placeholder="Enter Password Again..">
                    </div>
                </div>

                <div class="row">
                    <input type="submit" name="update" value="Update">
                </div>

                <div class="row">
                    <input type="submit" name="back" value="Back">
                </div>
            </form>
        </div>
    </body>
</html>
