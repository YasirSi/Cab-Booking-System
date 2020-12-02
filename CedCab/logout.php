<?php
    session_start();

    unset($_SESSION["userdata"]);
    unset($_SESSION["cabinfo"]);
    // session_abort($_SESSION["userdata"]);
    header("Location:index.php");
?>