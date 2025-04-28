<?php

session_start();

function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $first_name = sanitize_input($_POST['first_name']);
    $last_name = sanitize_input($_POST['last_name']);
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['phone']);
    $address = sanitize_input($_POST['address']);
    $city = sanitize_input($_POST['city']);
    $state = sanitize_input($_POST['state']);
    $zip_code = sanitize_input($_POST['zip_code']);
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);
    $terms = isset($_POST['terms']) ? true : false;

   
    if (empty($first_name) || empty($last_name) || empty($email) || empty($state) || empty($username) || empty($password) || !$terms) {
        $_SESSION['error'] = "Please fill out all required fields and agree to the terms.";
        header("Location: signup_form.php");
        exit();
    }

    
    $data = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'zip_code' => $zip_code,
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),  // Storing hashed password
    ];

   
    $file = fopen("submissions.txt", "a");
    fwrite($file, json_encode($data) . PHP_EOL);
    fclose($file);


    $_SESSION['success'] = "Thank you for signing up! Your information has been submitted.";
    header("Location: signup_success.php");
    exit();
} else {
 
    $_SESSION['error'] = "Invalid form submission.";
    header("Location: signup_form.php");
    exit();
}
?>
