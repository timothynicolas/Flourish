<?php  
    session_start();
	include("admin_edit_db.php");
    
    

    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: ../login/login.php");
        exit(); 
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM bookings_tbl WHERE booking_id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $service_id = $_POST['service_id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone_num = $_POST['phonenum'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $sql = "UPDATE bookings_tbl SET booking_id='$id', user_id='$user_id', service_id='$service_id', fname='$fname', lname='$lname', phone_num='$phone_num', date='$date', time='$time' WHERE booking_id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Booking updated successfully!";
        } else {
            echo "Error updating booking: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        header("Location: ../admin.php"); // Redirect back to main page
        exit();
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flourish | EDIT</title>
    <link rel="stylesheet" href="admin_edit.css">
    <link rel="icon" type="image" href="../../../resources/favicon.png">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/bec7f6dce9.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!-- NAVBAR -->
    <div class="navbar">
        <h1>Flourish</h1>
        <ul class="navbar-buttons">

            <li><div class="user-menu">
            <span class="user-name" onclick="toggleDropdown()">Welcome, <?php echo $_SESSION["username"]  ?> (admin) ▾</span>
            <ul class="dropdown-menu">
            <li><a href="#"><?php 
                if(isset($_SESSION["username"])){
                    echo $_SESSION["username"];
                }else{
                    echo "Guest";
                }
            ?></a></li>
            <li><a href="#">Bookings</a></li>
            <li><a href="#">Users</a></li>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">

                <li><input class="logout" type="submit" name="logout" value="Logout"></li>
            </form>
        </ul>
    </div>
        </li>
        </ul>
        <div class="off-screen-menu">
            <button class="close-btn">&times;</button> 
            <ul>
                <li>Home</li>
                <li>About</li>
                <li>Services</li>
                <li>Reviews</li>
                
            </ul>
        </div>
       
        <div class="ham-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

	<div class="filler"></div>

    <!-- BODY -->
   

    <div class="booking-section">
		
        <div class="booking-container">
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
				<p class="booking-main-text">Edit Row</p>
                <div class="booking-inputs">
                    <input type="hidden" name="id" value="<?php echo $row['booking_id']; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                    <label>First Name: </label><br>
                    <input type="text" name="firstname" placeholder="First Name" value="<?php echo $row["fname"] ?>" required><br>
                    <label>Last Name: </label><br>
                    <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $row["lname"] ?>" required><br>
                    <label>Phone Number: </label><br>
                    <input type="number" name="phonenum" placeholder="Phone Number" value="<?php echo $row["phone_num"] ?>" required><br>
                    <label>Service: </label><br>
                    <select name="service_id"  required>
                        <option value="<?php echo $row["service_id"] ?>"  selected><?php if($row["service_id"] == 1){
                            echo"Microneedling";
                        }elseif($row["service_id"] == 2){
                            echo"Dermaplaning";
                        }elseif($row["service_id"] == 3){
                            echo"Glow Treatment";
                        }elseif($row["service_id"] == 4){
                            echo"Chemical Peel";
                        }elseif($row["service_id"] == 5){
                            echo"Dermaplaning";
                        } 
                        
                        
                        
                        ?></option>
                        <option value="1">Microneedling</option>
                        <option value="2">Dermaplaning</option>
                        <option value="3">Glow Treatment</option>
                        <option value="4">Chemical Peel</option>
                        <option value="5">Hydrafacial</option>
                    </select><br>
                    <label>Date: </label><br>
                    <input type="date" name="date" value="<?php echo $row["date"] ?>" required><br>
                    <label>Time: </label><br>
                    <input type="time" name="time" value="<?php echo $row["time"] ?>" required><br>
                    <input type="submit" name="update" value="Update" id="book-btn">
                </div>
			</form>
        </div>
    </div>
    

	



    <!-- FOOTER -->
    <div class="footer">
        

        <div class="footer-section">
            <p>Website</p>
            <ul>
                <li>Home</li>
                <li>Features</li>
                <li>Pricing</li>
                <li>FAQs</li>
                <li>About</li>
            </ul>
        </div>

        <div class="footer-section">
            <p>Support</p>
            <ul>
                <li>Payment</li>
                <li>Cancellation</li>
                <li>Refund</li>
                <li>Terms</li>
                <li>Help</li>
            </ul>
        </div>

        <div class="footer-section">
            <p>Resources</p>
            <ul>
                <li>Blog</li>
                <li>FAQs</li>
                <li>Tips</li>
                <li>Socials</li>
                <li>Privacy </li>
            </ul>
        </div>

        <div class="footer-email">
            <p class="footer-email-maintext">Subscribe to our newsletter</p>
            <p>Monthly digest of what's new and exciting from us</p>
            <input type="email" placeholder="Email Address">
            <button>Subscribe</button>
            
        </div>

        <div class="footer-hr">
            <hr>
        </div>

        <div class="footer-copyright">
            <p>© 2025 Flourish, Inc. All rights reserved.</p>
        </div>
        <div class="footer-socmed">
           
            <i class="fa-brands fa-square-facebook fa-2xl" style="color: #ffffff;"></i>
           
            <i class="fa-brands fa-x-twitter fa-2xl" style="color: #ffffff;"></i>
            <i class="fa-brands fa-instagram fa-2xl" style="color: #ffffff;"></i>
        </div>

        
    </div>

    <script src="admin_edit.js"></script>
</body>
</html>

<?php 
	
    


?>