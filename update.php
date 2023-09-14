<?php 
include 'database.php';


if(isset($_POST['editBtn'])){
  $edit_inputID = $_POST['edit_inputID'];
  $edit_user_input = $_POST['edit_user_input'];
}

if(isset($_POST['update'])){
  $update_inputID = $_POST['update_inputID'];
  $update_user_input = $_POST['update_user_input'];


  $queryUpdate = "UPDATE tbl_todolist SET user_input = '$update_user_input' WHERE input_ID = $update_inputID";
  $sqlUpdate = mysqli_query($conn, $queryUpdate);

  echo '<script>alert("Successfully Updated!")</script>';
  echo '<script>window.location.href = "index.php"</script>';
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="update_user_input" value="<?php echo $edit_user_input; ?>">

    <input name="update" type="submit" value="UPDATE" >       
        <input name="update_inputID" type="hidden" value="<?php echo $edit_inputID; ?>" >
  </form>
   
                    
</html>