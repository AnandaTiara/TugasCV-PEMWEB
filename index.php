<?php
session_start();
$error = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $domain = explode('@', $email)[1] ?? '';
    if ($password === $domain) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header('Location: form.php');
        exit;
    } else {
        $error = 'Email atau password salah!'; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="login-container">
        <div class="image-container">
            <img src="image/Login image.jpeg" alt="">
        </div>
        <div class="login-form-container">
            <div class="login-header">
                <h1>Login</h1>
                <p>Make Your Own CV</p>
            </div>

            <form method="POST" class="login-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="signin-button">Sign In</button>
                <?php if (!empty($error)): ?> 
                    <p class="error-message" style="color: red;"> <?php echo $error; ?> </p>
                <?php endif; ?>
            </form>
            <div class="nb">
                <i>*Password harus berupa nama domain dari email. email : <b>abc@gmail.com</b> password : <b>gmail.com</b></i>
            </div>
        </div>
    </div>
</body>

</html>
