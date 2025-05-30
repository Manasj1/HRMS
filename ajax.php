<?php
session_start();
require 'config/db.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Fetch the user
    $sql = "SELECT email, password FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "SQL Error: " . mysqli_error($conn);
        exit;
    }

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // If passwords are stored as plain text
        if ($password === $row['password']) {
            $_SESSION['email'] = $row['email'];
            echo 'done';
        } else {
            echo 'Password mismatch: Entered=' . $password . ' | Stored=' . $row['password'];
        }
    } else {
        echo 'No user found with email: ' . $email;
    }
}
?>