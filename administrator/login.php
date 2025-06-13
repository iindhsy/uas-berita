<?php
require_once __DIR__ . '/../config/db.php';
include_once __DIR__ . '/../controllers/AuthController.php';

// Cek apakah session sudah dimulai sebelum memanggil session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$auth = new AuthController($connect);
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $error = $auth->login($email, $password);

    if (!$error && isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
        // Redirect ke router utama index.php?page=admin
        header("Location: ../index.php?page=admin");
        exit();
    }
}

if ($error) {
    echo "<script>alert('Login gagal: $error');</script>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    :root {
        --primary-color: #a9203e;
        --secondary-color: #f8f9fc;
    }

    body {
        background-color: var(--secondary-color);
        height: 100vh;
        display: flex;
        align-items: center;
    }

    .login-container {
        max-width: 400px;
        width: 100%;
        margin: 0 auto;
        animation: fadeIn 0.5s ease-in-out;
    }

    .login-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .login-header {
        background-color: var(--primary-color);
        color: white;
        padding: 1.5rem;
        text-align: center;
    }

    .login-body {
        padding: 2rem;
        background-color: white;
    }

    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 5px;
        margin-bottom: 1.25rem;
    }

    .btn-login {
        background-color: var(--primary-color);
        border: none;
        padding: 0.75rem;
        width: 100%;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-login:hover {
        background-color: #a9203e;
    }

    .login-footer {
        text-align: center;
        padding: 1rem;
        background-color: #f8f9fc;
        border-top: 1px solid #e3e6f0;
    }

    .input-group-text {
        background-color: white;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .login-container {
            padding: 0 15px;
        }

        .login-card {
            box-shadow: none;
        }
    }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h3><i class="fas fa-lock me-2"></i> ADMIN PANEL</h3>
                <p class="mb-0">Silakan masuk untuk melanjutkan</p>
            </div>

            <div class="login-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukkan email" required>
                        </div>
                        <div class="invalid-feedback">
                            Harap masukkan email
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Masukkan password" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">
                            Harap masukkan password
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-login mb-3">
                        <i class="fas fa-sign-in-alt me-2"></i> LOGIN
                    </button>

                    <div class="text-center">
                        <p class="mb-0">Belum punya akun? <a href="/beritaDW/index.php?page=regis" class="text-decoration-none">
                            registrasi disini</a></p>
                    </div>

                </form>
            </div>

            <div class="login-footer">
                <p class="mb-0 text-muted">© 2025 Indah. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function(button) {
        button.addEventListener('click', function() {
            const passwordInput = this.parentElement.querySelector('input');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });

    // Form validation
    // (function() {
    //     'use strict';

    //     const form = document.getElementById('loginForm');

    //     form.addEventListener('submit', function(event) {
    //         if (!form.checkValidity()) {
    //             event.preventDefault();
    //             event.stopPropagation();
    //         }

    //         form.classList.add('was-validated');
    //     }, false);
    // })();
    </script>
</body>

</html>