<?php  
    include("testdb.php");
    $sql = "SELECT * FROM bookings_tbl;";
    $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="Username"><br>
        <label>Service:</label><br>
        <input type="text" name="service" placeholder="Service"><br>
        <label>Date:</label><br>
        <input type="date" name="date"><br>
        <label>Time:</label><br>
        <input type="time" name="time"><br>
        <input type="submit" name="submit" value="Ipasa mo Beybe">
    </form>


    <table style="background-color: gray; margin: 50px;">
        <tr>
            <td style="background-color: yellow;">Booking ID:</td>
            <td style="background-color: yellow;">Username:</td>
            <td style="background-color: yellow;">Service:</td>
            <td style="background-color: yellow;">Date:</td>
            <td style="background-color: yellow;">Time:</td>
            <td style="background-color: yellow;">Update:</td>
            <td style="background-color: yellow;">Delete:</td>
        </tr>
        <tr>
            <?php

                while($row = mysqli_fetch_assoc($result)){

                
            ?>

            <td><?php echo $row['booking_id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['service']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><a href='edit.php?id=<?php echo $row["booking_id"]; ?>'>Edit</a></td>
            <td><a href='delete.php?id=<?php echo $row["booking_id"]; ?>' onclick="return confirm('Are you sure?')">Delete</a></td>

           

        </tr>
        <?php 
            }
        ?>
        
    </table>
</body>
</html>

<?php

   
    if(isset($_POST["submit"])){
        if((!empty($_POST["username"] && !empty($_POST["service"])) && (!empty($_POST["date"]) && !empty($_POST["time"])))){
            $username = $_POST["username"];
            $service = $_POST["service"];
            $date = $_POST["date"];
            $time = $_POST["time"] . ":00";
           

            try{
                
                $sql = "INSERT INTO bookings_tbl(username, service, date, time)VALUES('$username', '$service', '$date', '$time');";
                //mysqli_query($conn, $sql);
                echo"Booking Accepted!";
                
                echo "
                    <div>
                        <p>Username: $username</p><br>
                        <p>Service: $service</p><br>
                        <p>Date: $date</p><br>
                        <p>Time: $time</p><br>
                    </div>
                ";
            }catch(mysqli_sql_exception){
                echo"Could not register booking.";
            }

        }


       
    }

    mysqli_close($conn);
?>