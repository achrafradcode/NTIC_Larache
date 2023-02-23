<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>Contact Vous</h2>
        
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>

            </tr>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "istadb";
                
                // Create connection  
                $connection = new mysqli($servername, $username, $password, $database);
                
                // check connection 
                if ($connection->connect_error) {
                    die ("Connection failed: " . $connection->connect_error);
                }

                // Read all row from database table
                $sql = "SELECT * FROM  contact ";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // read data of each row 
                while($row = $result->fetch_assoc()){
                    echo "
                        <tr>
                        <td>$row[id]</td>
                        <td>$row[nom]</td>
                        <td>$row[telephone]</td>
                        <td>$row[email]</td>
                        <td>$row[message]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/Tadkir/edit.php?id=$row[id]'>edit</a>    
                            <a class='btn btn-danger btn-sm' href='/Tadkir/delete.php?id=$row[id]'>delete</a>    
                        </td>
                    </tr>
                    ";
                }

                
                ?>
                
            </tbody>
        </table>
    </div>

</body>
</html>