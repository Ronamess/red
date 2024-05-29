<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sign in</title>
    <?php include "bootstrap_head.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <div class="bg-white mt-3 py-3">
                <h2 class="text-success py-3"> Form Sign in </h2>
                <form action="forms/func1.php" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br><br>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </section>
    <?php include "footer.php";
    include "bootstrap_body.php";
    ?>
</body>

</html>