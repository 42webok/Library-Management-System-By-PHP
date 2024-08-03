<?php
include("conn.php");


if(isset($_GET['id'])){
    $delId = $_GET['id'];
    $delQuery = "DELETE FROM `books` WHERE `id` = '$delId'";
    $delResult = mysqli_query($conn , $delQuery);
    if(!$delResult){
        echo "Error";
    }
    else{
        header("location:index.php?delMsg=Data Deleted SuccessFully!");
    }
}

?>