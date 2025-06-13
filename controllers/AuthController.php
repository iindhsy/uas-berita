<?php
if (!class_exists('AuthController')) {
    class AuthController {
        private $connect;

        public function __construct($dbConnection) {
            $this->connect = $dbConnection;
        }

        public function login($email, $password) {
            $stmt = $this->connect->prepare("SELECT id, namalengkap, email, password FROM tb_users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['success_message'] = "Login Berhasil!";
                    $_SESSION['admin_logged_in'] = true;
                    $stmt->close();
                    return null; // login sukses
                } else {
                    $stmt->close();
                    return "Invalid password!";
                }
            } else {
                $stmt->close();
                return "Email not found!";
            }
        }

        // public function getacces(){
        //     $_SESSION['admin_logged_in'] = true;
        // }

        // public function getCurrentUser() {
        //     if (!isset($_SESSION['user_id'])) {
        //         return null;
        //     }

        //     $user_id = $_SESSION['user_id'];
        //     $stmt = $this->connect->prepare("SELECT fullname, email, image FROM tb_users WHERE id = ?");
        //     $stmt->bind_param("i", $user_id);
        //     $stmt->execute();
        //     $result = $stmt->get_result();

        //     if ($result->num_rows === 1) {
        //         $user = $result->fetch_assoc();
        //         $stmt->close();
        //         return $user;
        //     }
        //     $stmt->close();
        //     return null;
        // }

        // public function getUserData() {
        //     if (!isset($_SESSION['user_id'])) {
        //         return null;
        //     }
        //     $user_id = $_SESSION['user_id'];
        //     $stmt = $this->connect->prepare("SELECT fullname, email, jenis_kelamin, image  FROM tb_users WHERE id = ?");
        //     $stmt->bind_param("i", $user_id);
        //     $stmt->execute();
        //     $result = $stmt->get_result();
        //     $user = $result->fetch_assoc();
        //     $stmt->close();
        //     if ($user) {
        //         $user['prefix'] = ($user['jenis_kelamin'] == "L") ? "Mr." : "Ms.";
        //     }        
        //     return $user ?: [];
        // }
    }
}
?>