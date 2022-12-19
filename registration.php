<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>
</head>
<body>
    <form action="" method="post" autocomplete="off">
        <label for="name">Name: </label>
            <input type="text" name="name" id="name"><br><br>
        <label for="username">User-Name: </label>
            <input type="text" name="username" id="username"><br><br>
        <label for="email">Email: </label>
            <input type="email" name="email" id="email" required value=""><br><br>
        <label for="password">Password: </label>
            <input type="password" name="password" id="password" required value=""><br><br>
        <label for="confirmpassword">Confirm-Password: </label>
            <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br><br><br>
        
        <input type="submit" name="submit" id="submit" value="SUBMIT"><br><br><br>

         <a href="login.php">Login</a>
    </form>
</body>
</html>

<?php
    require "config.php";

    if(!empty($_SESSION['id']))
    {
        header("Location:index.php");
    }

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        $duplicate = mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$username' OR email='$email'");

        if(mysqli_num_rows($duplicate)>0)
        {
            echo "<script>alert('User-name or Email already exist!!')</script>";
        }
        else
        {
            if($password==$confirmpassword)
            {
                $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
                mysqli_connect($conn,$query);
                echo "<script>alert('Registration success.')</script>";
            }
            else
            {
                echo "<script>alert('Password does not match!.')</script>";
            }
        }
    }
?>















