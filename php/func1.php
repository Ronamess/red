<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <titlel>  Form Sign in </title>
    <?php include "bootstrap_head.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <div class="bg-white p-5 mb-3">
                <h2 class="text-primary">
                    welcome
                </h2>
               <?php
                $fullName = $_POST['fullName'];
                $email = $_POST['email'];
                $password = $_POST['password'];
               ?>
               <div><?= $fullName ?></div>
               <div><?= $email ?></div>

            </div>
        </div>
    </section>
    <?php include "footer.php";
    include "bootstrap_body.php";
    ?>
</body>

</html>