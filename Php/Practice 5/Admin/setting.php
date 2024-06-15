<?php
// شروع بخش PHP برای پردازش فرم‌ها
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['profileName']) && isset($_POST['profileEmail'])) {
        $profileName = $_POST['profileName'];
        $profileEmail = $_POST['profileEmail'];
        
        // اینجا می‌توانید کدهای لازم برای ذخیره داده‌ها در پایگاه داده را اضافه کنید
        // به عنوان مثال:
        // $sql = "UPDATE users SET name='$profileName', email='$profileEmail' WHERE id=1";
        // mysqli_query($conn, $sql);

        echo "Profile settings updated!";
    }
    if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        
        if ($newPassword === $confirmPassword) {
            // اینجا می‌توانید کدهای لازم برای تغییر رمز عبور در پایگاه داده را اضافه کنید
            // به عنوان مثال:
            // $sql = "UPDATE users SET password='$newPassword' WHERE id=1";
            // mysqli_query($conn, $sql);

            echo "Password changed successfully!";
        } else {
            echo "New passwords do not match!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
        .form-wrapper {
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
                <li class="nav-item">
                    <a class="nav-link" href="Users.php">Users</a>
                </li>
                <li class="nav-item active">
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
                <li class="nav-item">
                    <a class="nav-link" href="Users.php">Users</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="setting.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reports</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Settings</h2>
            <div class="form-wrapper">
                <h3>Profile Settings</h3>
                <form method="post">
                    <div class="form-group">
                        <label for="profileName">Name</label>
                        <input type="text" class="form-control" id="profileName" name="profileName" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="profileEmail">Email</label>
                        <input type="email" class="form-control" id="profileEmail" name="profileEmail" placeholder="Enter your email">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>

            <div class="form-wrapper mt-4">
                <h3>Account Settings</h3>
                <form method="post">
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Current password">
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>

            <div class="form-wrapper mt-4">
                <h3>General Settings</h3>
                <form method="post">
                    <div class="form-group">
                        <label for="siteTitle">Site Title</label>
                        <input type="text" class="form-control" id="siteTitle" name="siteTitle" placeholder="Enter site title">
                    </div>
                    <div class="form-group">
                        <label for="siteDescription">Site Description</label>
                        <textarea class="form-control" id="siteDescription" name="siteDescription" rows="3" placeholder="Enter site description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
