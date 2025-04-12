<?php
   

    session_start();
    $isLoginWrong = false;
    include("logindb.php");

    if(isset($_POST["signin"])) {
        if(!empty($_POST["username"]) && !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $_SESSION["username"] = $username;

            $check_sql = "SELECT * FROM users_tbl WHERE username = ?";
            $stmt = mysqli_prepare($conn, $check_sql);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {
                
                if(password_verify($password, $row["password"])) {
                    if($row["username"] == 'paul@admin') {
                        header("Location: ../admin/admin.php");
                        exit();
                    } else {
                        $_SESSION["user_id"] = $row["user_id"];
                        // echo $_SESSION["user_id"];
                        header("Location: ../home/home.php");
                        exit();
                    }
                } else {
                    $isLoginWrong = true; 
                }
            } else {
                $isLoginWrong = true; 
            }
        } else {
            $isLoginWrong = true;
        }
    }

    if(isset($_POST["signup"])) {
        header("Location: ../signup/signup.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Flourish | Sign In</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image" href="../../resources/favicon.png">
    <script src="https://kit.fontawesome.com/0b0cb22309.js" crossorigin="anonymous"></script>
    <!-- GOOGLE FONTS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
<body>
    <div class="container">
        <div class="ellipse1">
            
        </div>
        <div class="ellipse2">
            
        </div>
        <div class="form-box">
            <h1 style="font-family: 'DM Serif Text';">Flourish</h1>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" name="username" class="input-user" >
                    </div>
                
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" class="input-user">
                    </div>
                    <?php 
                        if($isLoginWrong){

                            echo'
                            <div class="error-message">
                                <i class="fa-solid fa-triangle-exclamation" style="color: #ffffff;"></i>
                                <p>Invalid Username / Password</p>
                            </div> 
                            ';
                        }
                    
                    ?>
                    
                    <br>
                   

                    <p>Don't have an account? <input class="input-sign-up" type="submit" name="signup" value="Sign Up"></p>
                    
                    <br>
                </div>
                <div class="btn-field-signin">
                    <input type="submit" class="input-submit" name="signin" value="Sign In">
                  
                   
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>
<?php
    

    

     // session_start();
    // $isLoginWrong = false;
    // include("logindb.php");

    // if(isset($_POST["signin"])){
    //     if(!empty($_POST["username"]) && !empty($_POST["password"])){

    //         $username = $_POST["username"];
    //         $password = $_POST["password"];

    //         $_SESSION["username"] = $username;

    //         $hash = password_hash($password, PASSWORD_DEFAULT);

    //         //$check_pw_sql = "SELECT * FROM users_tbl WHERE username = '$username' AND password = '$hash'";

            

            
    //         // $check_sql = "SELECT * FROM users_tbl WHERE username = '$username' AND password = '$password'";
    //         $check_sql = "SELECT * FROM users_tbl WHERE username = '$username' AND password = '$hash'";

    //         if(password_verify($password, $hash))
    //         $result = mysqli_query($conn, $check_sql);

    //         if(mysqli_num_rows($result) > 0){
    //             $row = mysqli_fetch_assoc($result);

    //             if($row["username"] == 'paul@admin'){
    //                 header("Location: ../admin/admin.php");
    //             }else{
    //                 header("Location: ../home/home.php");
    //             }
                
    //         }else{
    //             $isLoginWrong = true;
    //         }
    //     }else{
    //         echo"Please enter username and password";
    //     }
    // }

    // if(isset($_POST["signup"])){
    //     header("Location: ../signup/signup.php");
    // }

   

?>