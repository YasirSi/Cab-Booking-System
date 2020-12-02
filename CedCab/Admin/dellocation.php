<?php
    include("../dbConnect.php");

    $dbConnect = new dbConnect();

    $query = "SELECT * FROM tbl_location";
    $result = mysqli_query($dbConnect->connect, $query);
    
    if(isset($_GET['id']))
    {
        if($result ->num_rows>0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $id = $_GET['id'];
                if($row['id'] == $id)
                {
                    $sql = "DELETE FROM tbl_location WHERE id = $id";
                    $result = mysqli_query($dbConnect->connect, $sql);
                    header("Location:locationL.php");
                }
            }
        }
    }
?>