<?php  
	session_start();
    include("admindb.php");
    $sql = "SELECT * FROM bookings_tbl;";
    $result = mysqli_query($conn, $sql);
    

    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: ../login/login.php");
        exit(); 
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flourish | ADMIN</title>
    <link rel="stylesheet" href="admin.css">
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
    <center><h1 class="bookings-main-text">Customer Appointments</h1></center>
    <div class="table-container">
        <table class="bookings-table">
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Service ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
            <tr>
                <?php  
                    while($row = mysqli_fetch_assoc($result)){

                    
                ?>
                <td><?php echo $row['booking_id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['service_id']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['phone_num']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td>
                    
                    <a href='edit/admin_edit.php?id=<?php echo $row["booking_id"]; ?>'>
                        <button class="edit-btn">
                            <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                        </button>
                    </a>
                    <a href='delete/admin_delete.php?id=<?php echo $row["booking_id"] ?>'>
                        <button class="delete-btn">
                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                        </button>
                    </a>
                </td>
                
            </tr>
            <?php  
                    
                        
                }
            ?>
            
            

        </table>
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

    <script src="admin.js"></script>
</body>
</html>

<?php 
	


?>