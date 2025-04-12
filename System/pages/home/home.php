<?php
    session_start();

   
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
    <title>Flourish | Home</title>
    <link rel="stylesheet" href="home.css">
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
            <li><a href="#hero">Home</a></li>
            <li><a href="#story">About</a></li>
            <li><a href="#service">Services</a></li>
            <li><a href="#cta">Book</a></li>
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
            <form action="home.php" method="post">

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

    <!-- HERO SECTION -->
    <div class="ellipse-hero">
            
    </div>
    <div class="hero-section" id="hero">
        <div class="hero-section-cta">
            <p class="hero-sub-text">THE BEAUTY BRAND</p>
            <p class="hero-main-text">Elevating Beauty, Defining Elegance</p>
            <p class="hero-sub-text">BESPOKE BEAUTY, CRAFTED JUST FOR YOU</p>

            <div class="hero-buttons-div">
                <a href="../booking/booking.php"><button class="hero-booknow-btn">Book Now</button></a>
                <a href="#service"><button class="hero-services-btn">Services</button></a>
            </div>
        </div>

        <div class="hero-section-picture">
            <img src="../../resources/hero.png">
        </div>
    </div>

    <!-- STORY SECTION -->

    <div class="ellipse-story"></div>
    <div class="story-section" id="story">

        <div class="story-section-picture">
            <img src="../../resources/story.png">
        </div>

        <div class="story-section-text">
            <p class="story-main-text">Our Story</p>
            <p class="story-sub-text">In 1995, Anneliese von Berg founded Flourish in Germany, blending artistry and science to redefine beauty. Inspired by her studies under Parisian skincare experts, the clinic began as a small studio and grew into a sanctuary of elegance and innovation. Today, Flourish continues to craft timeless, bespoke beauty, combining personalized care with cutting-edge technology to radiate confidence in every client.</p>
            <button class="story-btn">Read More</button>
        </div>
    </div>
    
    <!-- SERVICES SECTION -->

    <div class="services-section" id="service">
        <div class="service-ellipse1"></div>
        <div class="service-ellipse2"></div>
        <p class="services-main-text">Services</p>
        <div class="services-main-container">

            <!-- SERVICE 1 -->

            <div class="service-container">
                <img src="../../resources/service1.png" class="service-img">

                <div class="service-details">
                    <p class="service-details-label">Microneedling</p>
                    <p class="service-details-desc">A minimally invasive procedure that uses a device with fine needles to create micro-injuries in the skin. This stimulates collagen and elastin production, improving skin texture, reducing acne scars, fine lines, and hyperpigmentation while enhancing overall skin firmness and elasticity.</p>
                    <div class="service-buttons-container">

                        <button class="book-service-btn" >Book</button>
                        <button class="service-details-btn"> Details</button>
                    </div>
                </div>
            </div> 

            <!-- SERVICE 2 -->

            <div class="service-container">
                <img src="../../resources/service2.jpeg" class="service-img">

                <div class="service-details">
                    <p class="service-details-label">Dermaplaning</p>
                    <p class="service-details-desc">A manual exfoliation procedure where a sterile scalpel is used to remove dead skin cells and fine vellus hair (peach fuzz). This treatment enhances product absorption, smooths the skin's surface, and gives an instant radiant glow, making makeup application flawless.</p>
                    <div class="service-buttons-container">

                        <button class="book-service-btn" >Book</button>
                        <button class="service-details-btn"> Details</button>
                    </div>
                </div>
            </div> 

            <!-- SERVICE 3 -->

            <div class="service-container">
                <img src="../../resources/service3copy.jpeg" class="service-img">

                <div class="service-details">
                    <p class="service-details-label">Glow Treatment</p>
                    <p class="service-details-desc">A semi-permanent skin treatment that involves microneedling a tinted serum into the skin to create a foundation-like effect. It helps even out skin tone, reduce the appearance of redness, and provide a natural glow, with results lasting for several weeks.</p>
                    <div class="service-buttons-container">

                        <button class="book-service-btn" >Book</button>
                        <button class="service-details-btn"> Details</button>
                    </div>
                </div>
            </div> 

            <!-- SERVICE 4 -->

            <div class="service-container">
                <img src="../../resources/service1.png" class="service-img">

                <div class="service-details">
                    <p class="service-details-label">Microneedling</p>
                    <p class="service-details-desc">A minimally invasive procedure that uses a device with fine needles to create micro-injuries in the skin. This stimulates collagen and elastin production, improving skin texture, reducing acne scars, fine lines, and hyperpigmentation while enhancing overall skin firmness and elasticity.</p>
                    <div class="service-buttons-container">

                        <button class="book-service-btn" >Book</button>
                        <button class="service-details-btn"> Details</button>
                    </div>
                </div>
            </div> 

            <!-- SERVICE 5 -->

            <div class="service-container">
                <img src="../../resources/service5.jpeg" class="service-img">

                <div class="service-details">
                    <p class="service-details-label">Chemical Peel</p>
                    <p class="service-details-desc">A treatment that uses a chemical solution to exfoliate the outer layers of the skin, revealing smoother, brighter, and more even-toned skin underneath. It's effective for reducing acne, hyperpigmentation, and fine lines, while stimulating collagen production.</p>
                    <div class="service-buttons-container">

                        <button class="book-service-btn" >Book</button>
                        <button class="service-details-btn"> Details</button>
                    </div>
                </div>
            </div>

            <!-- SERVICE 6 -->

            <div class="service-container">
                <img src="../../resources/service6.jpeg" class="service-img">

                <div class="service-details">
                    <p class="service-details-label">Hydrafacial</p>
                    <p class="service-details-desc">A multi-step facial treatment that cleanses, exfoliates, extracts impurities, and hydrates the skin using a specialized device. It's suitable for all skin types and addresses concerns like dryness, uneven texture, and clogged pores, leaving the skin refreshed and glowing.</p>
                    <div class="service-buttons-container">

                        <button class="book-service-btn" >Book</button>
                        <button class="service-details-btn"> Details</button>
                    </div>
                </div>
            </div>
            
        </div>

       
       
    </div> 

    <!-- CALL TO ACTION SECTION -->

    <div class="cta-section" id="cta">
        <div class="cta-text">
            <p class="cta-main-text">Book a Reservation</p>
            <p class="cta-sub-text">Transform your skin with our expert care. Spaces fill up fast—reserve your spot now and take the first step toward a radiant, refreshed you!</p>

            <div class="cta-button-container">


                <a href="../booking/booking.php"><button class="cta-book-btn">Book Now</button></a>
                <button class="cta-contact-btn">Contact Us</button>
            </div>
        </div>
        <div class="cta-picture">
            <img src="../../resources/cta.png">
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

    <!-- MODAL -->

    <div class="modal-overlay"></div>

    <div class="modal-container">
        <div class="modal-title-container">

            <p>Continue to Login Page?</p>
        </div>
        <div class="modal-body-container">
            You must be logged in to continue booking a service.
        </div>
        <div class="modal-button-container">
            <button class="modal-close-btn" onclick="hideModal()">Close</button>
            <button class="modal-login-btn" onclick="redirectToLogin()">Log In</button>
        </div>
    </div>
    
   

    <script src="home.js"></script>
</body>
</html>

 
