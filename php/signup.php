<?php
session_start();
require_once 'db.php';  // Correct (both files in php folder)


// If already logged in, redirect
if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
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
    <!-- ✅ Added Font Awesome for eye icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
         body {
            background: url('../img/backgroung.avif') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        /* 🧾 Signup Container */
        .signup-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 35px 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
        }

        .signup-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .signup-header h2 {
            font-weight: 700;
            color: #333;
        }

        .text-muted {
            color: #666 !important;
        }

        /* ✨ Form Styling */
        .form-label {
            color: #444;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .input-group-text {
            background: #f8f9fa;
            border: 1px solid #ccc;
            border-left: none;
        }

        /* ✅ Button Styling */
        .btn-signup {
            width: 100%;
            background: #007bff;
            color: #fff;
            border: none;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px;
            transition: 0.3s;
        }

        .btn-signup:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        /* 🔔 Alert Styling */
        .alert {
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        /* 🔗 Login Link */
        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #007bff;
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
            <h2>Sign up </h2>
            <!-- <p class="text-muted">to get started</p> -->
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
        
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label fw-bold">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
            </div>
            
            <!-- ✅ Updated Password Field with Eye Icon -->
            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Minimum 6 characters" required>
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>
            
            <!-- ✅ Updated Confirm Password Field with Eye Icon -->
            <div class="mb-3">
                <label class="form-label fw-bold">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="confirm_password" id="confirmPassword" class="form-control" placeholder="Re-enter password" required>
                    <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>
            
            <button type="submit" class="btn btn-signup">Sign Up</button>
        </form>
        
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- ✅ Added JavaScript for Password Show/Hide -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordField = document.getElementById('confirmPassword');
        
        // For main password field
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
        
        // For confirm password field
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    });
    </script>
</body>
</html>