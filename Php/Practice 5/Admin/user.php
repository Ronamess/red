<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($name, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO people_info (Email, Number, Password) VALUES (?, ?, ?)";
        $params = ['sss', $name, $email, $hashed_password];

        if ($this->db->query($sql, $params)) {
            echo "Data inserted successfully<br>";
        } else {
            echo "Error inserting data: " . $this->db->error;
        }
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM admins WHERE username = ?";
        $params = ['s', $username];
        $stmt = $this->db->query($sql, $params);
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin_username'] = $username;
                header("location: admin_panel.php");
                exit;
            } else {
                return "Invalid password";
            }
        } else {
            return "Invalid username";
        }
    }
}
?>
