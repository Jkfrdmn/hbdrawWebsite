<?php
session_start();
$success_message = isset($_SESSION['success']) ? $_SESSION['success'] : null;

// clear the message after displaying
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up Successful</title>
</head>
<body>
    <h1>Sign Up Successful</h1>

    <?php if ($success_message): ?>
        <p><?php echo $success_message; ?></p>
    <?php else: ?>
        <p>No success message found. Please <a href="signup_form.php">go back</a> and try again.</p>
    <?php endif; ?>

    <a href="index.html">Return to Home</a>
</body>
</html>
