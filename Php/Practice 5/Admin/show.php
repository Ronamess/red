<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "Users";

//  ایجاد اتصال
 $conn = new mysqli($servername, $username, $password, $dbname);

 // چک کردن اتصال
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

// کوئری برای دریافت رکوردها
 $sql = "SELECT id, username, password FROM users";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     // نمایش رکوردها
     while($row = $result->fetch_assoc()) {
         echo "ID: " . $row["id"]. " - نام کاربری: " . $row["username"]. " - رمز عبور: " . $row["password"]. "<br>";
     }
 } else {
     echo "0 results";
 }
 // کوئری برای بررسی اطلاعات کاربر
  $sql = "SELECT * FROM users WHERE username = '$input_username' AND password = '$input_password'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     // اگر اطلاعات کاربر مطابقت داشت، رکوردهای جدول را نمایش بدهید
     echo "<table><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
     }
    echo "</table>";
} else {
     echo "اطلاعات وارد شده صحیح نیستند یا کاربری با این مشخصات یافت نشد.";
 }

 $conn->close();
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "Users";

 // اطلاعات ورودی از فرم
 $input_username = $_POST['username'];
 $input_password = $_POST['password'];

// ایجاد اتصال
 $conn = new mysqli($servername, $username, $password, $dbname);

 // چک کردن اتصال
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 // کوئری برای بررسی اطلاعات کاربر
 $sql = "SELECT * FROM users WHERE username = '$input_username' AND password = '$input_password'";
 $result = $conn->query($sql);
 // کوئری برای دریافت رکوردها
  $sql = "SELECT id, username, password FROM users";
  $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // اگر اطلاعات کاربر مطابقت داشت، رکوردهای جدول را نمایش بدهید
    echo "<table><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
     }
     echo "</table>";
 } else {
     echo "اطلاعات وارد شده صحیح نیستند یا کاربری با این مشخصات یافت نشد.";
 }

 $conn->close();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 800px;
            width: 100%;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            background-color: #003f7f;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Users";

        // اطلاعات ورودی از فرم
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];

        // ایجاد اتصال
        $conn = new mysqli($servername, $username, $password, $dbname);

        // چک کردن اتصال
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // کوئری برای بررسی اطلاعات کاربر
        $sql = "SELECT * FROM userinfo WHERE username = '$input_username' AND password = '$input_password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // اگر اطلاعات کاربر مطابقت داشت، رکوردهای جدول را نمایش بدهید
            $sql = "SELECT id, username, password FROM users";
            $result = $conn->query($sql);

            echo "<table><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
            }
            echo "</table>";
            echo "<button onclick=\"location.href='ali'\">Go to Your Page</button>";
        } else {
            echo "اطلاعات وارد شده صحیح نیستند یا کاربری با این مشخصات یافت نشد.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
