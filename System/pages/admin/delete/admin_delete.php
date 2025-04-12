<?php
    include("admin_delete_db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM bookings_tbl WHERE booking_id = $id";

        if (mysqli_query($conn, $sql)) {
            echo "Booking deleted successfully!";
        } else {
            echo "Error deleting booking: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        header("Location: ../admin.php"); // Redirect back to main page
        exit();
    }
?>
