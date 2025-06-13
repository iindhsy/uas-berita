<?php
// index.php

session_start();
include_once __DIR__ . '/config/db.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    //pilihan
    case 'home':
        include __DIR__ . '/bagian/template/title.php';
        include __DIR__ . '/bagian/template/navbar.php';
        include __DIR__ . '/pilihan/home.php';
        break;

    case 'nasional':
        include __DIR__ . '/bagian/template/title.php';
        include __DIR__ . '/bagian/template/navbar.php';
        include __DIR__ . '/pilihan/home.php';
        break;
    
    case 'internasional':
        include __DIR__ . '/bagian/template/title.php';
        include __DIR__ . '/bagian/template/navbar.php';
        include __DIR__ . '/pilihan/home.php';
        break;

    //detail
    case 'respon':
        include __DIR__ . '/bagian/template/title.php';
        include __DIR__ . '/bagian/template/navbar.php';
        include __DIR__ . '/pages/respon.php';
        break;

    //administrator
    case 'login':
        include __DIR__ . '/administrator/login.php';
        break;

    case 'regis':
        include __DIR__ . '/administrator/register.php';
        break;

    case 'admin':
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            include __DIR__ . '/administrator/dashboard.php';
        } else {
            echo "<script>alert('Anda harus login terlebih dahulu!');window.location.href='index.php?page=login';</script>";
        }
        break;
        
    case 'logout':
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        header("Location: index.php?page=login");
        exit();

    case 'unggah' :
        include __DIR__ . '/administrator/upload-berita.php';
        break;

    case 'perbaikan' :
        include __DIR__ . '/administrator/maintenance.php';
        break;
        
    default:
        include __DIR__ . '/pages/404.php'; 
        break;
}
?>