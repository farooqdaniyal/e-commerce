<?php
session_start();
require_once 'db.php';  // Correct (both files in php folder)


// If already logged in, redirect
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";
$success = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Please fill all fields!";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters!";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check if email already exists
        $check_sql = "SELECT * FROM users WHERE email = '$email'";
        $check_result = mysqli_query($conn, $check_sql);
        
        if (mysqli_num_rows($check_result) > 0) {
            $error = "Email already registered!";
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert user
            $sql = "INSERT INTO users (name, email, password, role) 
                    VALUES ('$name', '$email', '$hashed_password', 'user')";
            
            if (mysqli_query($conn, $sql)) {
                $success = "Registration successful! Please login.";
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }
        
        .signup-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            max-width: 450px;
            width: 90%;
        }
        
        .signup-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .signup-header h2 {
            color: #333;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .form-control {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-signup {
            width: 100%;
            padding: 12px;
            background: #667eea;
            border: none;
            font-weight: 600;
            font-size: 16px;
            border-radius: 8px;
            color: white;
            transition: all 0.3s;
        }
        
        .btn-signup:hover {
            background: #5568d3;
            transform: translateY(-2px);
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .login-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-header">
            <h2>📝 Create Account</h2>
            <p class="text-muted">Sign up to get started</p>
        </div>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($success)): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                <br><a href="login.php" class="fw-bold">Click here to login</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="signup.php">
            <div class="mb-3">
                <label class="form-label fw-bold">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Minimum 6 characters" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Re-enter password" required>
            </div>
            
            <button type="submit" class="btn btn-signup">Sign Up</button>
        </form>
        
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>