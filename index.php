<?php
include("header.php");
?>


    <div class="container mt-5">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New Book
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">


      <form action="insert.php"  method="post" id="myFrm">
  <div class="row mb-3">
    <label for="title" class="col-sm-12 col-form-label">Add Book Title</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="title-bk" name="title">
    </div>
  </div>
  <div class="row mb-3">
    <label for="author" class="col-sm-12 col-form-label">Add Book Author</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="author-bk" name="author">
    </div>
  </div>
  <div class="row mb-3">
    <label for="publish-year" class="col-sm-12 col-form-label">Add Phblish Year</label>
    <div class="col-sm-12">
      <input type="number" class="form-control" id="year-bk" name="year">
    </div>
  </div>
  <div class="row mb-3">
    <label for="genre" class="col-sm-12 col-form-label">Add Book Genre</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="genre-bk" name="genre">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Add Book</button>
</form>



      </div>
    </div>
  </div>
</div>




    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Publish_Year</th>
            <th scope="col">Genre</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $view = "SELECT * FROM `books`";
         $result = mysqli_query($conn, $view);
         $count = 1;
         if($result -> num_rows == 0){
          echo "<td><center><h6>No Data Found</h6></center></td>";
         }
         else{
          while($row = mysqli_fetch_assoc($result)){
            ?>
          <tr>
            <th scope="row"><?php echo $count ?></th>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['aurthor'] ?></td>
            <td><?php echo $row['publish_year'] ?></td>
            <td><?php echo $row['genre'] ?></td>
            <td><a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Update</a></td>
            <td><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>

          </tr>
            <?php
            $count++;
          }
         }
         ?>



         
       
        </tbody>
      </table>
    <div id="mg-cont">
    <?php
      if(isset($_GET['insertMsg'])){
        echo "<h5>" . $_GET['insertMsg'] . "</h5>";
      }
      ?>
    </div>
    <div id="mg-cont">
      <?php
      if(isset($_GET['delMsg'])){
        echo "<h5>" . $_GET['delMsg'] . "</h5>";
      }
      ?>
      </div>
      <div id="mg-cont">
      <?php
      if(isset($_GET['up_msg'])){
        echo "<h5>" . $_GET['up_msg'] . "</h5>";
      }
      ?>
      </div>
    </div>





<footer class="p-3 mt-5 bg-dark text-light text-center">
       <h5>Copyright @ 2024</h5>
</footer>












   
    <script>
      $(document).ready(function(){
        $("#myFrm").validate({
            rules:{
              title:{
                required:true,
                minlength:5
              },
              author:{
                required:true,
                minlength:3
              },
              year:{
                required:true,
                number:true,
                range: [1800,2024]
              },
              genre:{
                required:true,
                minlength:10
              }
            }
        });
      });



      document.addEventListener("DOMContentLoaded", function() {
        let mg = $("#mg-cont");
        setTimeout(() => {
          mg.hide();
        }, 3000);
      });
    </script>

</body>
</html>