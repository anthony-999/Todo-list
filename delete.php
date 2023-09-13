<?php

include 'database.php';

if(isset($_POST['deleteBtn'])){
    $delete_inputID = $_POST['delete_inputID'];

    $sqlDELETE = "DELETE FROM tbl_todolist WHERE input_ID = $delete_inputID";
    
    $sqlDelete = mysqli_query($conn, $sqlDELETE);
    echo 
    '<script>
        alert("Deleted Successfully");
    </script>';
    echo ("<script>location.href='index.php'</script>");


}

?>