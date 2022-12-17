<?php
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "test");

$conn = mysqli_connect(SERVER, USERNAME, PASSWORD) or die("Nije moguće konektovati se na server baze podataka!");
mysqli_select_db($conn, DATABASE) or die("Nije moguće odabrati bazu podataka. Da li je kreirana?");

$upit = "SELECT * FROM users ORDER BY id DESC";

$rs = mysqli_query($conn, $upit);

$korisnici = array();

$count = 0;
$ime_korisnika = "";
while ($row = mysqli_fetch_assoc($rs)) {
    if ($count === 1) {
        break;
    }
    $korisnici[] = $row;
    $ime_korisnika = $korisnici['full_name'];
    $count = 1;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sulejman Hoxha and Nurudin Tivari" />
    <meta name="description" content="Services for stomatology website" />
    <link rel="icon" href="img/logo.jpg" type="image/x-icon" />
    <title>Ordinacija SN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <style>
        .slika {
            background-image: url("img/usluge5.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body style="background-color: #42858c">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-black col">
        <div class="container">
            <a class="navbar-brand col-9" href="index.html">
                <img src="img/logo.jpg" width="30" height="24" class="d-inline-block align-text-top" alt="" />

                Ordinacija SN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Početna</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Usluge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html" style="white-space: nowrap">O nama</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $ime_korisnika; ?>
                        </a>
                        <ul class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="php/sign_in.php">Odjavi se</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid text-center text-light text-lg-center slika" style="height: 600px">
        <h6 style="
          text-align: center;
          vertical-align: middle;
          line-height: 500px;
          font-size: 80px;
        " class="text-dark">
            Naše Usluge
        </h6>
    </div>

    <div class="p-5">
        <div class="card-group">
            <div class="card">
                <img src="img/usluge1-surgery.jpg" class="card-img-top h-50" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Operacije</h5>
                    <p class="card-text">
                        Cijena: <br />
                        <strong>Zavisi od vrste operacije.</strong>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="php/create_account.php" class="btn btn-outline-primary">Zakazi</a>
                </div>
            </div>

            <div class="card">
                <img src="img/usluge2-skeniranje.jpg" class="card-img-top h-50" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">XR-Ray skeniranje</h5>
                    <p class="card-text">
                        Cijena: <br />
                        <strong>50$</strong>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="php/create_account.php" class="btn btn-outline-primary">Zakazi</a>
                </div>
            </div>
            <div class="card">
                <img src="img/usluge3-laboratorija.jpg" class="card-img-top h-50" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Obican pregled</h5>
                    <p class="card-text">
                        Cijena: <br />
                        Za djecu: <strong>10$</strong> <br />
                        Za odrasle: <strong>20$</strong>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="php/create_account.php" class="btn btn-outline-primary">Zakazi</a>
                </div>
            </div>
        </div>
    </div>
    <p style="color: black; text-align: center; font-size: 30px">
        <em>Profesionalnost uvijek na prvom mijestu!</em>
    </p>
    <div class="p-5">
        <div class="card-group">
            <div class="card">
                <img src="img/usluge6-implant.jpg" class="card-img-top h-50" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Implantologija</h5>
                    <p class="card-text">
                        Cijena: <br />
                        <strong>Zavisi od vrste implanata.</strong>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="php/create_account.php" class="btn btn-outline-primary">Zakazi</a>
                </div>
            </div>
            <div class="card">
                <img src="img/usluge7-proteza.jpg" class="card-img-top h-50" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Ortodoncija</h5>
                    <p class="card-text">
                        Cijena: <br />
                        Mobilna: <strong>200$</strong> <br />
                        Fiksna: <strong>600$</strong>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="php/create_account.php" class="btn btn-outline-primary">Zakazi</a>
                </div>
            </div>
            <div class="card">
                <img src="img/usluge8-whitening.jpg" class="card-img-top h-50" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Izbijelivanje zubi</h5>
                    <p class="card-text">
                        Cijena: <br />
                        <strong>85$</strong>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="php/create_account.php" class="btn btn-outline-primary">Zakazi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5 bg-black d-flex justify-content-center align-items-center">
        <div class="row container-fluid gap-5 d-flex justify-content-center">
            <div class="col-md-5 d-flex justify-content-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47491.290551073966!2d19.210603273803702!3d41.93143193772446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134e137ad7321337%3A0xd6ef6a2f6eb40acc!2sUlcinj!5e0!3m2!1sen!2s!4v1671238476695!5m2!1sen!2s"
                    style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-2 d-flex flex-column gap-2 p-2">
                <h2 class="text-white">Contact us</h2>
                <div>
                    <a href="https://www.facebook.com/" class="link-info" target="_blank"><i class="bi bi-facebook"></i>
                        Facebook</a>
                </div>
                <div>
                    <a href="https://www.instagram.com/" class="link-info" target="_blank"><i
                            class="bi bi-instagram"></i> Instagram</a>
                </div>
                <div>
                    <a href="https://twitter.com/" class="link-info" target="_blank"><i class="bi bi-twitter"></i>
                        Twitter</a>
                </div>
            </div>
            <div class="col-md-3 d-flex flex-column gap-2 text-white">
                <h2>Reservations</h2>
                <div><i class="bi bi-telephone"></i> +000 00 000 000</div>
                <div><i class="bi bi-envelope-at"></i> example@example.com</div>
                <div><i class="bi bi-geo-alt"></i>Ulcinj</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
</body>

</html>