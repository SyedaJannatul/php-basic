<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <form action="" method="post" autocomplete="off">
        <label for="usernameemail">User-Name / Email : </label>
            <input type="text" name="usernameemail" id="usernameemail" required value=""><br><br>
        <label for="password">Password: </label>
            <input type="password" name="password" id="password" required value=""><br><br>
        
        <input type="submit" name="submit" id="submit" value="login"><br><br><br>

         <a href="registration.php">Registration</a>
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
        $usernameemail = $_POST['usernameemail'];
        $password = $_POST['password'];

        $result = mysqli_query($conn,"SELECT * FROM tb_user WHERE username='$usernameemail' OR email='$usernameemail'");
        $rows = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)>0)
        {
            if($password==$rows['password'])
            {
                $_SESSION['login']=true;
                $_SESSION['id']=$row['id'];
                header("Location:index.php");
            }
            else
            {
                echo "<script>alert('Wrong Password!.')</script>";
            }
        }
        else
        {
            echo "<script>alert('User not registered!.')</script>";
        }
    }
?>
