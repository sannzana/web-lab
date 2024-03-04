<?php
include 'database.php';

if(isset($_POST['submit'])) {
    $name = $_POST["n"];
    $email = $_POST["e"];
    $number = $_POST["num"];
    $sub = $_POST["sub"];
    $mes = $_POST["mes"];

    // Validate Telephone Number (must be numeric and 11 characters)
    if (!is_numeric($number) || strlen($number) !== 11) {
        echo "<script>
        var confirmPhoneNumber = confirm('You have given an invalid phone number. Would you like to try again?');
        if(confirmPhoneNumber) {
            window.location.href = 'contact2.php';
        } else {
            window.location.href = 'portlast.php';
        }
      </script>";
exit();
    } 

        
        else {
            // Insert data into the database
            $sql = "INSERT INTO contact(`full_name`, `email`, `mobile_number`, `subject`, `message`) 
                    VALUES ('$name','$email','$number','$sub','$mes')";

            $result = mysqli_query($conn, $sql);

            if($result) {
                echo "<div class='alert'>Data inserted successfully!!</div>";
                header('Location: portlast.php');
            } else {
                die(mysqli_error($conn));
            }
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact2.css">
    
    
</head>
<body>
    
<form method="post">
  <div >
    <label for="exampleInputEmail1" class="form-label">Name: </label>
    <input type="text"  name="n"class="form-control" id="exampleInputEmail1" >
    
  <div >
    <label for="exampleInputPassword1" class="form-label">Email: </label>
    <input type="email"  name="e" class="form-control" id="exampleInputPassword1">
  </div>
  <div >
    <label for="exampleInputPassword1" class="form-label">Telephone Number: </label>
    <input type="text" name="num" class="form-control" id="exampleInputPassword1">
  </div>
  <div >
    <label for="exampleInputPassword1" class="form-label">Subject: </label>
    <input type="text" name="sub" class="form-control" id="exampleInputPassword1">
  </div>

  <div >
    <label for="exampleInputPassword1" class="form-label">Messege: </label>
    <input type="text" name="mes" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


</body>
</html>


