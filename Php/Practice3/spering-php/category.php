<html>
<head>
  <title>Spering</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="" />
            <span>
              Main page 
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="workl.php">Work </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="category.php"> Category </a>
              </li>
            </ul>
            <div class="user_option">
              <a href="">
                <span>
                  Login
                </span>
              </a>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class=" s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <section class="slider_section ">
      <div class="carousel_btn-container">
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <h1>
                      You Can <br>
                      look<br>
                      Here
                    </h1>
                    <p>
                      It is look
                      a page
                    </p>
                    <div class="btn-box">
                    </div>
                  </div>
                </div>
                <div class="offset-md-1 col-md-4 img-container">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <h1>
                      You Can <br>
                      look<br>
                      Here
                    </h1>
                    <p>
                      It is look
                      a page
                    </p>
                    <div class="btn-box">
                    </div>
                  </div>
                </div>
                <div class="offset-md-1 col-md-4 img-container">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- <section class="experience_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="img-box">
            <img src="images/experience-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">

<Main>
 <section>
           
            <?php
            // if
            $condition = true;
            if ($condition) {
                echo "<p>example is If.</p>";
            } else {
                echo "<p> example is else.</p>";
            }

            //  switch
            $color = "red";
            switch ($color) {
                case "red":
                    echo "choose red.";
                    break;
                case "blue":
                    echo "choose blue.";
                    break;
                default:
                    echo "choose another.";
            }

            //  loop
            echo "<ul>";
            for ($i = 1; $i <= 3; $i++) {
                echo "<li>item $i</li>";
            }
            echo "</ul>";

            //  foreach
            $fruits = array("apple", "orange", "banana");
            echo "<ul>";
            foreach ($fruits as $fruit) {
                echo "<li>$fruit</li>";
            }
            echo "</ul>";
            ?>
        </section>
    </main>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="category_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Category
        </h2>
      </div>
      <div class="category_container">
        <div class="box">
          <div class="img-box">
            <img src="images/c1.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Design 
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/c2.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Web Development
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/c3.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
             pc
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/c4.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              film
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/c5.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Logo Design
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/c6.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Game Design
            </h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="container-fluid footer_section ">
    <div class="container">
      <p>
        &copy; <span id="displayDate"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer> -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>
</body>
</html>