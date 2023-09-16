<?php 
include 'database.php';


if(isset($_POST['editBtn'])){
  $edit_inputID = $_POST['edit_inputID'];
  $edit_user_input = $_POST['edit_user_input'];
}


  function update(){
    include 'database.php';

    if (isset($_POST['update'])) {
      $update_inputID = $_POST['update_inputID'];
      $update_user_input = $_POST['update_user_input'];

      // Query the old value from the database
      $querySelect = "SELECT user_input FROM tbl_todolist WHERE input_ID = $update_inputID";
      $resultSelect = mysqli_query($conn, $querySelect);

      if ($resultSelect) {
          $row = mysqli_fetch_assoc($resultSelect);
          $old_user_input = $row['user_input'];

          // Compare the new value with the old value
          if ($update_user_input !== $old_user_input) {
              $queryUpdate = "UPDATE tbl_todolist SET user_input = '$update_user_input' WHERE input_ID = $update_inputID";
              $sqlUpdate = mysqli_query($conn, $queryUpdate);

            
                // Display a sweet alert for success
                echo "<script>alert('Update Successfully')</script>";
      
          }
      }
    
      echo '<script>window.location.href = "index.php"</script>';
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Add these links in the head of your HTML file -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body class="bg-secondary-subtle">
      
<div class=" mt-5">
    <div class="d-flex align-items-center justify-content-center"> <!-- Center the row -->
        <div class="col-xl-9"> <!-- Adjust the column width as needed -->
            <h1 class="mb-3">Update</h1>

            <form action="" method="post">
                <div class="mb-3">
                    <?php update(); ?>
                    <input type="text" id="update_user_input" name="update_user_input" value="<?php echo $edit_user_input; ?>" class="form-control">
                </div>

                <input type="hidden" name="update_inputID" value="<?php echo $edit_inputID; ?>">

                <div class="mb-3 d-flex justify-content-end">
                    <a class="btn btn-danger mx-3" href="index.php" role="button">Cancel</a>
                    <button type="submit" name="update" class="btn btn-success">Save Changes</button>
                </div>
                <?php ?>
            </form>
        </div>
    </div>
</div>

 
   
         <!-- BOOTSTRAP SCRIPT CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>                                       
</html>