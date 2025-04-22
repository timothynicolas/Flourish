<?php
    session_start();

    $isCredentialExisiting = false;

    include("signupdb.php");

    if(isset($_POST["signin"])){
        header("Location: ../login/login.php");
        exit();
    }

    if(isset($_POST["signup"])){
        if(!empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $_SESSION["username"] = $username;

            $check_sql = "SELECT * FROM users_tbl WHERE email = '$email' OR username = '$username'";
            $result = mysqli_query($conn, $check_sql);

            if(mysqli_num_rows($result) > 0){
                $isCredentialExisiting = true;

            }else{

                $sql = "INSERT INTO users_tbl(username, password, email) VALUES('$username', '$hashed_password', '$email')";

                
                try{
                    mysqli_query($conn, $sql);
                    echo"user is now registered";
                    header("Location: ../home/home.php");
                }catch(mysqli_sql_exception){
                    echo"Could not register user.";
                }
            };
        }else{
            echo"Please fill all the required fields.";
        }
        
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Flourish | Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" type="image" href="../../resources/favicon.png">
    <script src="https://kit.fontawesome.com/0b0cb22309.js" crossorigin="anonymous"></script>
    <!-- GOOGLE FONTS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
<body>
    <div class="container">
        <div class="ellipse1"></div>
        <div class="ellipse2"></div>
        <div class="form-box">
            
            <h1 style="font-family: 'DM Serif Text';">Flourish</h1>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" >
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" class="input-user">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" name="username" class="input-user">
                    </div>
                
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" class="input-user">
                    </div>

                    <?php 

                        if($isCredentialExisiting){
                            echo'
                            
                            <div class="error-message">
                                <i class="fa-solid fa-triangle-exclamation" style="color: #ffffff;"></i>
                                <p>Email/Username already exists</p>
                            </div> 
                            ';
                        }
                    
                    ?>
                    
                    <br>
                    <p>Already have an account? <input class="input-sign-in" type="submit" name="signin" value="Sign In"></p>
                    <br>
                </div>
                <div class="btn-field-signin">
                    <input type="submit" class="input-submit" name="signup" value="Sign Up">
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>
