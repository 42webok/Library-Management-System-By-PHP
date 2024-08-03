<?php
include("conn.php");

// $dataCheck = "SELECT * FROM data";
// $result = mysqli_query($conn, $dataCheck);
//  if(mysqli_num_rows($result) == 0){
    
//  }

if(isset($_POST)){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];

       $sql = "INSERT INTO books(title , aurthor , publish_year , genre) VALUES ('$title' , '$author' , '$year' , '$genre')";
       $query = mysqli_query($conn , $sql);
       if(!$query){
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
       else{
          header("location:index.php?insertMsg=Data inserted SuccessFully!");
       }
}



?>