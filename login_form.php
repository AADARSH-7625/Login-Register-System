<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">

  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My Web</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<?php
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $Name=$_POST['name'];
            $Email=$_POST['email'];
            $Password=$_POST['pass'];
            $Concern=$_POST['desc'];
            // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            //     <strong>Success!</strong> Your data entry has been submitted successfully.
            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //     </div>';

                        $servername="localhost";
                        $username="root";
                        $password="";
                        $database="my database";
                
                        $conn=mysqli_connect($servername,$username,$password,$database);
                        if(!$conn){
                            die("Sorry we failed to connect with server".mysqli_connect_error());
                        }
                        else{
                            // echo"Connection was successful!<br>";
                        
                      
                        $sql="INSERT INTO `user authentication` ( `Name`, `Email`, `Password`, `Concern`, `Date`) VALUES ( '$Name', '$Email', '$Password', '$Concern', current_timestamp())";

                //$sql="UPDATE `user authentication` SET `Name`='Shubham' ,`Username` = 'shubham@2001', `Password`='shubham@7625' WHERE `user authentication`.`S no.` = 1";
                        $Result=mysqli_query($conn,$sql);
                        if($Result){
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your data entry has been submitted successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            }
                            else{
                                // echo"The Entry was not inserted successfully!,Because of this error-->". mysqli_error($conn);
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> We are facing some technical issue,Your data entry was not submitted successfully.We regret the inconvenience..
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                
                            }
                        }
        }
       
    ?>

  <section class="My_Con">
          
    <div class="container py-3 bg-transparent Mycon" style="width:50vw;">
    
    <form action="/xampp/login_form.php" method="post" class="py-3 Form">
    <h1 class="head">Contact Us</h1>
   <div class="mb-3">
    <label for="name" class="form-label" required>Name</label>
    <input type="text" class="form-control bg-transparent" id="name" style="color:white;" name="name" required>
    
   </div>
   <div class="mb-3">
    <label for="email" class="form-label" >Email</label>
    <input type="email" class="form-control bg-transparent" style="color:white;" id="email" name="email" aria-describedby="emailHelp" required>
    
   </div>
   <div class="mb-3">
    <label for="pass" class="form-label" >Password</label>
    <input type="password" class="form-control bg-transparent" style="color:white;" id="pass" name="pass" required>
    
   </div>
   <div class="mb-3">
    <label for="desc" class="form-label">Description</label>
    <textarea class="form-control bg-transparent" id="desc" id="desc" name="desc" rows="8" style="color:white;"></textarea>
    <div id="emailHelp" class="form-text " style="color:white;">We'll never share your data with anyone else.</div>
    </div>
    <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input bg-transparent" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
   </div>
   <button type="submit" class="btn btn-outline-primary" style=" --bs-btn-padding-y: 5px; --bs-btn-padding-x: 12px; --bs-btn-font-size: 18px;">Submit</button>
   </form>
    </div>
      </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>