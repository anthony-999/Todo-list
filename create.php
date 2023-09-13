<?php 
    include 'database.php';

    if(isset($_POST['submit'])){
     
        $user_input = $_POST['user_input'];

         $sql = "INSERT INTO tbl_todolist (user_input) VALUES ('$user_input')";
         $sqlQuery = mysqli_query($conn, $sql);


         echo 
         '<script>
             alert("Added Successfully");   
         </script>';
         echo ("<script>location.href='index.php'</script>");
   

    }

                  
   
?>