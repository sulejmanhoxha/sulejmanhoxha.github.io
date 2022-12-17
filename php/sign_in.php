<?php
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "test");

$conn = mysqli_connect(SERVER, USERNAME, PASSWORD) or die("Nije moguće konektovati se na server baze podataka!");
mysqli_select_db($conn, DATABASE) or die("Nije moguće odabrati bazu podataka. Da li je kreirana?");

$emailErr = $passwordErr = $loginErr = "";
$email = $password = "";

$greska = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $greska = 1;
    } else {
        $email = test_input($_POST["email"]);
    }
    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
        $greska = 1;
    } else {
        $password = test_input($_POST["password"]);
    }

    if ($greska == 0) {
        $upit = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        $rs = mysqli_query($conn, $upit) or die("Greška u upitu: " . mysqli_error($conn));

        if ($rs && mysqli_num_rows($rs) > 0) {
            header('Location: /mysite/index.html');
        } else {
            $emailErr = "";
            $passwordErr = "";
            $loginErr = "Wrong credentials";
        }
    }

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sulejman Hoxha and Nurudin Tivari" />
    <meta name="description" content="Sign in page for stomatology website" />
    <link rel="icon" href="../img/logo.jpg" type="image/x-icon" />
    <title>Ordinacija SN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
</head>

<body>


    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-black col">
        <div class="container">
            <a class="navbar-brand col-9" href="index.html">
                <img src="../img/logo.jpg" width="30" height="24" class="d-inline-block align-text-top" alt="" />

                Ordinacija SN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-3">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../usluge.html">Usluge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.html">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Nalog
                        </a>
                        <ul class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item active" aria-current="page" href="#">Prijavite se</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="create_account.php">Napravite nalog</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center align-items-center" style="height: 85vh; background-color:   #2c4458">
        <div class="container p-3 border shadow rounded-3"
            style="height: 500px; width: 500px; background-color: #466394">
            <div class="d-flex justify-content-center">
                <img src="../img/user.png" class="rounded-circle" style="width: 150px; height: 150px" alt="" />
            </div>

            <h1 class="text-center text-white">Prijavite se</h1>
            <form action="sign_in.php" method="POST">
                <span class="text-danger">*
                    <?php echo $emailErr; ?>
                </span>
                <div class="form-floating mb-3">
                    <input name="email" type="text" class="form-control" id="email" placeholder="Email adresa"
                        value="<?php echo $email; ?>" />
                    <label for="email">Email adresa</label>
                </div>
                <span class="text-danger">*
                    <?php echo $passwordErr; ?>
                </span>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" />
                    <label for="password">Password</label>
                </div>
                <span class="text-danger">
                    <?php echo $loginErr; ?>
                </span>
                <div class="d-flex justify-content-center">
                    <button type="submit" value="submit" class="btn btn-outline-light mt-2">
                        Prijavite se
                    </button>
                </div>
                <p class="text-light text-center">
                    Vec imate nalog? Kliknite
                    <a href="create_account.php" class="link-info">ovdje</a>
                </p>
            </form>
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
            <div class="col-md-2 d-flex flex-column gap-2">
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

    <!-- <script src="script.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
</body>

</html>