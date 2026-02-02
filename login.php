<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "studyBoxdb");

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            echo "Login successful Welcome, " . $row['username'];
        } else {
            echo "Login failed  Incorrect password";
        }
    } else {
        echo "Login failed Email not found";
    }

    $conn->close();

} else {
    echo "Form not submitted correctly!";
}
?>
