<?php 

    function create(){


    include 'database.php';

    if(isset($_POST['submit'])){
     
        $user_input = $_POST['user_input'];

         $sql = "INSERT INTO tbl_todolist (user_input) VALUES ('$user_input')";
         $sqlQuery = mysqli_query($conn, $sql);

         echo "<script>Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Added Succesfully',
            showConfirmButton: false,
            timer: 1500
          })</script>";



    }
}

    

                  
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/dab3c82309.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body class="bg-secondary-subtle">


    <div class="container-wrapper">
        <div class="container-lg">
        <?php create(); ?>
            <div class="header    mt-5">
          
                <h1 class="text-center text-info">To do List</h1>
                   
                    <form action="" method="post">
                        <div class="input-group mt-5">
                            <input type="text" class="form-control" placeholder="Enter Activity" aria-label="Enter Activity" aria-describedby="basic-addon2"  name="user_input">
                            <span class="input-group-text" id="basic-addon2">
                                <input class="btn btn-success " type="submit" value="Submit" name="submit">
                                <input class="btn btn-primary " type="hidden" value="Submit" name="input_ID">
                            </span>
                        </div>
                    </form>
                   <?php  ?>
                

           
                <div class="activity mt-5 ">
                    <ul class="list-group ">
                        <?php 
                        
                            include 'database.php';
                            include 'create.php';
                           

                          

                            $querySelect = "SELECT * FROM tbl_todolist";
                            $result = $conn->query($querySelect );
                            
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo '<li class="list-group-item d-flex justify-content-between align-items-center mt-1">'
                                    .$row["user_input"].'<br>
                                        <div  class="d-flex justify-content-center align-items-center gap-3">

                                            <form action="delete.php" method="post">
                                        
                                            <button type="submit" class="btn btn-danger" name="deleteBtn">
                                            
                                          
                                            <i class="fa-solid fa-trash"></i>
                                          
                                            </button>
                                            <input type="hidden" name="delete_inputID" value='.$row['input_ID'].' >
                                          
                                           
                                            </form>
                                            
                                            <form action="update.php"  method="post">
                                        
                                            <button type="submit" class="btn btn-primary"  name="editBtn"  >
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <input type="hidden" name="edit_inputID" value='.$row['input_ID'].' >
                                            <input type="hidden" name="edit_user_input" value='.$row['user_input'].' >
                                            </form>
                                            
                                        </div>                           
                                    </li>';
                                    

                                    

                                    
                                    
                                }
                            } 

                            
                        ?>
                                            
                    </ul>
                </div>
            </div>
        </div>
    </div>



       

            
               
           




     <!-- BOOTSTRAP SCRIPT CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
                               
</body>
</html>