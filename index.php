<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div id="container">
        <div id="header-container">
            <div id="header">
                <div id="header-left">
                    <a href="#">Odkrywaj</a>
                </div>
                <div id="header-right">
                    <a href="#">Informacje</a>
                    <a href="#">Dla firm</a>
                    <a href="#">Blog</a>
                    &nbsp;
                    <button onclick="logIn()" id="login-btn">Log In</button>
                    <button onclick="register()" id="register-btn">Register</button>
                </div>
            </div>
        </div>

        <div id="main-container">
            <div id="main">




            </div>
        </div>


        <div id="login-container">
            <div id="login">
                <h1>Welcome to Pinterest</h1>
                <form action="index.php" method="post">
                    E-mail:<br>
                    <input type="text" name="email" id="input-login" placeholder="E-mail"></input><br>
                    Password:<br>
                    <input type="password" name="password" id="input-login" placeholder="Password"></input><br>
                    <a href="#">Forgot password?</a>
                    <br>
                    <input type="submit" name="login" value="Log in"></input>
                </form>
                <?php
                    if(isset($_POST['login'])){
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $password = mysqli_real_escape_string($conn, $_POST['password']);
                        if ($email){
                            if($password){
                                $password = md5($password);
                                $passwordCheck = mysqli_query($conn, "SELECT * FROM user WHERE password='$password'");
                                if(mysqli_num_rows($passwordCheck)){
                                    session_start();
                                    $_SESSION['email'] = $email;
                                    $_SESSION['logged'] = true;
                                    header('location: ideas.php');
                                }
                                else{
                                    echo'Password incorrect!';
                                }
                            }
                            else{
                                echo'Password cannot be empty!';
                            }
                        }
                        else{
                            echo'Email cannot be empty!';
                        }
                    }




                ?>
            </div>
        </div>


        <div id="register-container">
            <div id="register">
                    <h1>Welcome to Pinterest</h1>
                    <form action='index.php' method='post'>
                        E-mail:<br>
                        <input type="text" name="email" id="input-register" placeholder="E-mail"></input><br>
                        Username:<br>
                        <input type="text" name="username" id="input-register" placeholder="Username"></input><br> 
                        Password:<br>
                        <input type="password" name="password1" id="input-login" placeholder="Password"></input><br>
                        Repeat password:<br>
                        <input type="password" name="password2" id="input-login" placeholder="Repeat password"></input><br>
                        <input type='submit' name='register' value='Continue'></input>
                    </form>
                    <?php
                        if(isset($_POST['register'])){
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
                            $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
                            if($email){
                                if($username){
                                    if ($password1==$password2){
                                        $password = $password1;
                                        $insertQuery = mysqli_query($conn, "INSERT INTO user VALUES (null, '$username', '$email', '$password'");
                                        if($insertQuery){
                                            echo 'You have registered successfully!';
                                            header('location: index.php');
                                        }
                                        else{
                                            echo'Error!';
                                            exit();
                                        }
                                    }
                                    else{
                                        echo'Passwords are not matched!';
                                        exit();
                                    }
                                }
                                else{
                                    echo'Username cannot be empty';
                                    exit();
                                }
                            }
                            else{
                                echo'Email cannot be empty';
                                exit();
                            }
                        }
                    ?>
            </div>
        </div>

        <div id="gray">

        </div>






    </div>    
</body>
</html>