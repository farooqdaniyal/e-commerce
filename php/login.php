<?php
session_start();
require_once 'db.php';

// If already logged in, redirect
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: ../dashboard/dashboard.php");
    } else {
        header("Location: ../index.php");
    }
    exit();
}

$error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = trim($_POST['password']);
    
    // Validate inputs
    if (empty($email) || empty($password)) {
        $error = "Please fill all fields!";
    } else {
        // Check user in database
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Login successful
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                
                // Redirect based on role
                if ($user['role'] == 'admin') {
                    header("Location: ../dashboard/dashboard.php");
                } else {
                    header("Location: ../index.php");
                }
                exit();
            } else {
                $error = "Invalid password!";
            }
        } else {
            $error = "Email not found!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            max-width: 450px;
            width: 100%;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h2 {
            color: #333;
            font-weight: 700;
        }
        
        .form-control {
            padding: 12px;
            font-size: 16px;
        }
        
        .btn-login {
            width: 100%;
            padding: 12px;
            background: #667eea;
            border: none;
            font-weight: 600;
            font-size: 16px;
        }
        
        .btn-login:hover {
            background: #5568d3;
        }
        
        .alert {
            font-size: 14px;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    include "db.php";
    ?>
    <div class="login-container">
        <div class="login-header">
            <h2>🔐 Admin Login</h2>
            <p class="text-muted">Enter your credentials</p>
        </div>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="farooqecommercecr7@gmail.com" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-login">Login</button>
        </form>
        
        <div class="signup-link">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>