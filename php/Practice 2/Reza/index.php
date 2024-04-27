<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> main page </tittle>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <header>    
        <?php 
        include('view/navbar.php');
        ?>
    </header>

    <div class="container">
        <div id="carouselExampleControls" class="carousel slide slider" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="1.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="2.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="3.jpg">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">قبلی</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">بعدی</span>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php
            // if
            $condition = true;
            if ($condition) {
                echo "<p>این یک مثال از if است.</p>";
            } else {
                echo "<p>این یک مثال از else است.</p>";
            }

            // switch
            $color = "قرمز";
            switch ($color) {
                case "قرمز":
                    echo "رنگ قرمز انتخاب شده است.";
                    break;
                case "آبی":
                    echo "رنگ آبی انتخاب شده است.";
                    break;
                default:
                    echo "رنگ دیگری انتخاب شده است.";
            }

            // loop
            echo "<ul>";
            for ($i = 1; $i <= 3; $i++) {
                echo "<li>آیتم $i</li>";
            }
            echo "</ul>";

            // foreach
            $fruits = array("سیب", "پرتقال", "انگور");
            echo "<ul>";
            foreach ($fruits as $fruit) {
                echo "<li>$fruit</li>";
            }
            echo "</ul>";
            ?>
        </section>
    </main>

    <footer>
        <p>کپی رایت &copy; 2024 سایت من</p>
    </footer>


</body>
</html>