<?php
// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; // Changed 'Password' to 'password'

// Establish database connection
$conn = new mysqli('localhost', 'root', 'test', 'user_registration'); // Replace 'your_database_name' with the actual name of your database

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Prepare SQL statement to insert data into a table (assuming a table named 'users')
    $stmt = $conn->prepare("INSERT INTO user_registration(username, email, password) VALUES (?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("sss", $username, $email, $password); // 'sss' indicates three string parameters
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
