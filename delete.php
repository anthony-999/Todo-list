<?php

include 'database.php';

if(isset($_POST['deleteBtn'])){
    $delete_inputID = $_POST['delete_inputID'];

    $queryDelete = "DELETE FROM tbl_todolist WHERE input_ID = $delete_inputID";
    
    $sqlDelete = mysqli_query($conn, $queryDelete);
     echo 
    '<script>
   
    alert("Deleted Successful");
    </script>';
    echo ("<script>location.href='index.php'</script>");


}

?>