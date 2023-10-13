<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 pb-3">
                <a href="/myshop/create.php" class="btn btn-primary">Create</a>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>                            
                            <th scope="col">Mobile</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "myshop";

                            $connection = new mysqli($servername, $username, $password, $database);

                            if($connection->connect_error){
                                die("Connection Failed".$connection->connect_error);
                            }

                            $sql = "SELECT * FROM clients";
                            $result = $connection->query($sql);

                            if(!$result){
                                die("Invalid query : ".$connection->error);
                            }

                            while($row = $result->fetch_assoc()){
                                echo "
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                    <td>$row[mobile]</td>
                                    <td class='text-end'>
                                        <a class='btn btn-success' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                                        <a class='btn btn-danger' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                                    <td>
                                </tr>
                                ";
                            }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
        