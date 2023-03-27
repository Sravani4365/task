<?php
// Establish a connection to the database
$host = "localhost";
$user = "username";
$password = "password";
$database = "booking_system";
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection is successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$booking_id = $_POST['booking_id'];
$created_time = $_POST['created_time'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$drone_shot_name = $_POST['drone_shot_name'];
$booking_notes = $_POST['booking_notes'];

// Prepare the SQL query
$sql = "INSERT INTO customers (booking_id, created_time, email, phone_number) 
        VALUES ('$booking_id', '$created_time', '$email', '$phone_number')";
if (mysqli_query($conn, $sql)) {
  $customer_id = mysqli_insert_id($conn);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "INSERT INTO bookings (customer_id, drone_shot_name, booking_notes) 
        VALUES ('$customer_id', '$drone_shot_name', '$booking_notes')";
if (mysqli_query($conn, $sql)) {
  echo "Booking saved successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
