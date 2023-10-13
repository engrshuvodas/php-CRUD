<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";

    $connection = new mysqli($servername, $username, $password, $database);

    $name = "";
    $email = "";
    $mobile = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
    }

    do{
        if(empty($name) || empty($mobile) ){
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "INSERT INTO clients (name,email,mobile)"."VALUES ('$name','$email','$mobile')";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid query : ".$connection->error;
            break;
        }

        $name = "";
        $email = "";
        $mobile = "";

        $successMessage = "Client added correctly";

        header("location: /myshop/index.php");
        exit;

    } while(false);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php 
                    if(!empty($errorMessage)){
                        echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong> 
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        ";
                    }
                ?>
                <form action="#" method="post">
                    <label for="">Name : </label>
                    <input type="text" name="name" class="form-control mb-3" value="<?php echo $name; ?>">
                    <label for="">Email : </label>
                    <input type="text" name="email" class="form-control mb-3" value="<?php echo $email; ?>">
                    <label for="">Mobile : </label>
                    <input type="text" name="mobile" class="form-control mb-3" value="<?php echo $mobile; ?>">
                    <?php 
                        if(!empty($successMessage)){
                            echo "
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>$successMessage</strong> 
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            ";
                        }
                    ?>
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="/myshop/index.php" class="btn btn-outline-primary">Home</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
        