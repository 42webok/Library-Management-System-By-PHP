<?php
include("conn.php");
include("header.php");

if(isset($_GET['id'])){
    $insId = $_GET['id'];
    //  echo $insId;
    $query = "SELECT * FROM `books` WHERE `id` = '$insId'";
    $result = mysqli_query($conn , $query);
    if(!$result){
        echo "error";
    }
    else{
        $row = mysqli_fetch_assoc($result);
    }

}
?>

<?php
if(isset($_POST['update'])){
    if(isset($_GET['new_id'])){
        $upId = $_GET['new_id'];
    }
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $query = "UPDATE books SET title = '$title' , aurthor = '$author' , publish_year = '$year' , genre = '$genre' WHERE `id` = '$upId'";
    $result_up = mysqli_query($conn , $query);
    if(!$result_up){
        echo "error";
    }
    else{
        header("location:index.php?up_msg=Book Data Update Successfully!");
    }
}

?>




<div class="container mt-5">
<form action="update.php?new_id=<?php echo $row['id'];?>"  method="post">
  <div class="row mb-3">
    <label for="title" class="col-sm-12 col-form-label">Add Book Title</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" value="<?php echo $row['title'] ?>"  name="title">
    </div>
  </div>
  <div class="row mb-3">
    <label for="author" class="col-sm-12 col-form-label">Add Book Author</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" value="<?php echo $row['aurthor'] ?>" name="author">
    </div>
  </div>
  <div class="row mb-3">
    <label for="publish-year" class="col-sm-12 col-form-label">Add Phblish Year</label>
    <div class="col-sm-12">
      <input type="number" class="form-control" value="<?php echo $row['publish_year'] ?>" name="year">
    </div>
  </div>
  <div class="row mb-3">
    <label for="genre" class="col-sm-12 col-form-label">Add Book Genre</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" value="<?php echo $row['genre'] ?>" name="genre">
    </div>
  </div>
  
  <button type="submit" name="update" class="btn btn-primary">Update Book</button>
</form>
</div>