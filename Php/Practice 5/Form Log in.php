<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Log in</title>S
    <?php include "bootstrap_head.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <div class="bg-white p-5 mb-3">

          
                <h2 class="text-primary">
                Form Log in
                </h2>
                <form action="func2form_submited.php" method="POST">
                    <div class="form-group">
                        <label for="nameInput">Name and Family</label>
                        <input type="text" class="form-control" id="nameInput" name="fullName"
                            placeholder="Enter Your Name and Family">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Agree</button>
                </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <?php include "footer.php";
    include "bootstrap_body.php";
    ?>
</body>

</html>