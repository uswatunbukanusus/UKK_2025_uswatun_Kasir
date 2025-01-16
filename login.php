<?php
session_start();
require 'koneksi.php'; // Pastikan koneksi database sesuai kebutuhan

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);

    // Login admin
    if ($username === 'admin' && $password === 'Admin123') {
        $_SESSION['role'] = 'admin';
        header("Location: admin.php");
        exit();
    }
    // Login petugas
    elseif ($username === 'petugas' && $password === 'Petugas123') {
        $_SESSION['role'] = 'petugas';
        header("Location: petugas.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: #e9e9e9;
      font-family: 'Montserrat', sans-serif;
    }

    * {
      box-sizing: border-box;
      transition: .25s all ease;
    }

    .login-container {
      display: block;
      position: relative;
      margin: 4rem auto 0;
      padding: 5rem 4rem 0 4rem;
      width: 100%;
      max-width: 525px;
      min-height: 680px;
      background-image: url('cowo.jpg');
      background-size: cover;
      background-position: center;
      box-shadow: 0 50px 70px -20px rgba(0, 0, 0, 0.85);
    }

    .login-container:after {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-image: radial-gradient(ellipse at left bottom, rgba(22, 24, 47, 1) 0%, rgba(38, 20, 72, .9) 59%, rgba(17, 27, 75, .9) 100%);
    }

    .form-login {
      position: relative;
      z-index: 1;
      padding-bottom: 4.5rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.25);
    }

    .login-nav {
      padding: 0;
      margin: 0 0 6em 1rem;
    }

    .login-nav__item {
      list-style: none;
      display: inline-block;
    }

    .login-nav_item + .login-nav_item {
      margin-left: 2.25rem;
    }

    .login-nav__item a {
      color: rgba(255, 255, 255, 0.5);
      text-decoration: none;
      text-transform: uppercase;
      font-weight: 500;
      font-size: 1.25rem;
    }

    .login-nav__item.active a,
    .login-nav__item a:hover {
      color: #ffffff;
    }

    .login__label {
      display: block;
      padding-left: 1rem;
      color: rgba(255, 255, 255, 0.5);
      margin-bottom: 1rem;
    }

    .login__input {
      color: white;
      font-size: 1.15rem;
      width: 100%;
      padding: .5rem 1rem;
      background-color: rgba(255, 255, 255, 0.25);
      border: 2px solid transparent;
      border-radius: 1.5rem;
      margin-bottom: 1rem;
    }

    .login__input:focus {
      border-color: rgba(255, 255, 255, 0.5);
      background-color: transparent;
    }

    .login__submit {
      color: #ffffff;
      font-size: 1rem;
      margin-top: 1rem;
      padding: .75rem;
      border-radius: 2rem;
      display: block;
      width: 100%;
      background-color: rgba(17, 97, 237, .75);
      border: none;
      cursor: pointer;
    }

    .login__submit:hover {
      background-color: rgba(17, 97, 237, 1);
    }

    .password-container {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translateY(-50%);
      cursor: pointer;
      color: rgba(255, 255, 255, 0.7);
    }

    .toggle-password:hover {
      color: #ffffff;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
  </style>
  </style>
</head>
<body>
  <div class="login-container">
    <form method="POST" action="" class="form-login">
      <ul class="login-nav">
        <li class="login-nav__item active">
          <a href="#">Sign In</a>
        </li>
      </ul>

      <label for="username" class="login__label">Username</label>
      <input id="username" name="username" class="login__input" type="text" required>

      <label for="password" class="login__label" style="margin-top: 1.5rem;">Password</label>
      <div class="password-container">
        <input id="password" name="password" class="login__input" type="password" required>
        <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
      </div>

      <button class="login__submit" type="submit">Sign In</button>
      <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordField = document.getElementById('password');
      const toggleIcon = document.querySelector('.toggle-password');
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>
