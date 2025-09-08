<?php
include 'config.php';
session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            echo "<script>alert('Login successful!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('No account found with this email!');</script>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Calendly Clone</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      display: flex; justify-content: center; align-items: center;
      height: 100vh; margin: 0;
    }
    .container {
      background: #fff; padding: 30px; border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      width: 350px; text-align: center;
      animation: fadeIn 0.6s ease-in-out;
    }
    h2 { margin-bottom: 20px; color: #333; }
    input {
      width: 90%; padding: 12px; margin: 10px 0;
      border: 1px solid #ddd; border-radius: 8px; outline: none;
      transition: 0.3s;
    }
    input:focus {
      border-color: #667eea;
      box-shadow: 0 0 6px rgba(102,126,234,0.5);
    }
    button {
      background: #667eea; color: #fff; border: none;
      padding: 12px; width: 100%; border-radius: 8px;
      font-size: 16px; cursor: pointer; transition: 0.3s;
    }
    button:hover { background: #764ba2; }
    p { margin-top: 15px; }
    a { color: #667eea; text-decoration: none; font-weight: bold; }
    a:hover { text-decoration: underline; }
    @keyframes fadeIn { from{opacity:0; transform:translateY(-20px);} to{opacity:1; transform:translateY(0);} }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <button type="submit">Login</button>
    </form>
    <p>Don’t have an account? <a href="signup.php">Sign up here</a></p>
  </div>
</body>
</html>
 
