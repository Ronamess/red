<?php
session_start();

// اتصال به دیتابیس
$servername = "localhost"; // نام سرور دیتابیس
$username = "root"; // نام کاربری دیتابیس
$password = ""; // رمز عبور دیتابیس
$dbname = "users"; // نام دیتابیس

// ساخت اتصال
$conn = mysqli_connect($servername, $username, $password, $dbname);
// چک کردن اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// اگر فرم ارسال شده است
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // گرفتن اطلاعات از فرم
    $name = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $role = $_POST['inputRole'];
    
    // ذخیره اطلاعات در دیتابیس
    $sql = "INSERT INTO users (name, email, role) VALUES ('$name', '$email', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// بستن اتصال به دیتابیس
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
        }
        .sidebar .active {
            background-color: #007bff;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Users.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="setting.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex">
        <div class="sidebar p-3">
            <h4>Admin Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Users.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="setting.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reports</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <h2>User Management</h2>
            <h3 class="mt-4">Add New User</h3>
            <form method="POST" action="userlist.php">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputRole">Role</label>
                    <select id="inputRole" class="form-control" name="inputRole">
                        <option selected>Choose...</option>
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
