<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli("localhost","root","","studyBoxdb");

    if ($conn->connect_error){
          die("Connection failed:".$conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, password) 
            VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql)==TRUE){
          echo "Registration successful ";
    }
    else{
          echo "Error: ".$conn->error;
    }

    $conn->close();
}
else {
    echo "Form not submitted correctly!";
}
?>
