


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="reg.css">
</head>

<body>

    <?php
    // session_start();
    // if(isset($_SESSION['username']) and isset($_SESSION['password'])){
    //     header("Location: login.php");
    // }

    // $message = '';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)) {
            die("All fields are required.");
        }

        $connection = mysqli_connect('localhost:3302','root','','data');

        if(!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM farihaa WHERE email='$username' AND password='$password'";
        $result = mysqli_query($connection, $query);

        if($result) {
            if(mysqli_num_rows($result) > 0){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: index.php");
            } else {
                $message = "Invalid username or password";
            }
        } else {
            $message = "Error executing query: " . mysqli_error($connection);
        }

        mysqli_close($connection);
    }
    ?>

    <div class="container">
        <h2 style="color:red;">Log in page</h2>

        <!-- <h4 style="color:green;">Total Visits: <?php echo $count?></h4> -->

        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Login">
        </form>

        <!-- <p id='msg'><?php echo $message?></p> -->
    </div>

</body>

</html>
