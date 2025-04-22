<?php  
	session_start();
    include("bookingdb.php");

    $isBookingSuccess = false;

    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: ../login/login.php");
        exit(); 
    }

    

    if(isset($_POST["book"])){
        if(
            (!empty($_POST["firstname"]) && !empty($_POST["lastname"])) &&
            (!empty($_POST["phonenum"]) && !empty($_POST["service_id"])) && 
            (!empty($_POST["date"]) && !empty($_POST["time"]))
        ){
            $user_id = $_POST["user_id"];
            $service_id = $_POST["service_id"];
            $fname = $_POST["firstname"];
            $lname = $_POST["lastname"];
            $phone_num = $_POST["phonenum"];
            $date = $_POST["date"];
            $time = $_POST["time"] . ":00";
    
            $appointmentDate = new DateTime($date);
            $bookingTime = new DateTime($time);
            $today = new DateTime();
            $minBookingDate = (clone $today)->modify('+2 days');
    

            $appointmentDate->setTime(0, 0, 0);
            $today->setTime(0, 0, 0);
            $minBookingDate->setTime(0, 0, 0);
    
            $openingTime = new DateTime('08:00:00');
            $closingTime = new DateTime('20:00:00');
    
            if ($appointmentDate < $today) {
                echo "<script>alert('You cannot book an appointment in the past!');</script>";
            } elseif ($appointmentDate < $minBookingDate) {
                echo "<script>alert('Appointments must be booked at least 2 days in advance.');</script>";
            } elseif ($bookingTime < $openingTime || $bookingTime > $closingTime) {
                echo "<script>alert('Appointments are only available between 8:00 AM and 8:00 PM.');</script>";
            } else {
                $checkSql = "SELECT COUNT(*) as total FROM bookings_tbl WHERE date = '$date'";
                $result = mysqli_query($conn, $checkSql);
                $row = mysqli_fetch_assoc($result);
    
                if ($row['total'] >= 20) {
                    echo "<script>alert('Sorry, the appointment slots for this day are fully booked. Please select another date.');</script>";
                } else {
                    try {
                        $sql = "INSERT INTO bookings_tbl(user_id, service_id, fname, lname, phone_num, date, time)
                                VALUES('$user_id', '$service_id','$fname', '$lname', '$phone_num', '$date', '$time');";
                        mysqli_query($conn, $sql);
                        $isBookingSuccess = true;
                    } catch (mysqli_sql_exception) {
                        echo "<script>alert('Could not register booking.');</script>";
                    }
                }
            }
        } else {
            echo "<script>alert('Please fill out all the required fields.');</script>";
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flourish | Book</title>
    <link rel="stylesheet" href="booking.css">
    <link rel="icon" type="image" href="../../resources/favicon.png">

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
            <li><a href="../home/home.php#hero">Home</a></li>
            <li><a href="../home/home.php#story">About</a></li>
            <li><a href="../home/home.php#service">Services</a></li>
            <li><a href="../home/home.php#cta">Book</a></li>
            <li><div class="user-menu">
            <span class="user-name" onclick="toggleDropdown()">Profile ▾</span>
            <ul class="dropdown-menu">
            <li><a href="#"><?php 
                if(isset($_SESSION["username"])){
                    echo $_SESSION["username"];
                }else{
                    echo "Guest";
                }
            ?></a></li>
            <li><a href="#">Settings</a></li>
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
                
				<p class="booking-main-text">Book Service</p>

                <?php 
                    if($isBookingSuccess){
                        echo'
                            <div class="error-message">
                                <i class="fa-solid fa-circle-check" style="color: #ffffff;"></i>
                                <p>Appointment Booked</p>
                            </div> 
                        ';
                    }
                ?>
                
				<label>First Name: </label><br>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
				<input type="text" name="firstname" placeholder="First Name" required><br>
				<label>Last Name: </label><br>
				<input type="text" name="lastname" placeholder="Last Name" required><br>
				<label>Phone Number: </label><br>
				<input type="number" name="phonenum" placeholder="Phone Number" required><br>
				<label>Service: </label><br>
				<select name="service_id" required>
					<option value="" disabled selected>Select an option</option>
					<option value="1">Microneedling</option>
					<option value="2">Dermaplaning</option>
					<option value="3">Glow Treatment</option>
					<option value="4">Chemical Peel</option>
					<option value="5">Hydrafacial</option>
				</select><br>
				<label>Date: </label><br>
				<input type="date" name="date" required min="<?php echo date('Y-m-d', strtotime('+2 days')); ?>"><br>
				<label>Time: </label><br>
				<input type="time" name="time" required min="08:00" max="20:00"><br>

                
				<input type="submit" name="book" value="Book" class="book-btn">
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

    <script src="booking.js"></script>
</body>
</html>

<?php 
	

	mysqli_close($conn);


?>