    <?php
    include("config.php");

    if (!isset($_SESSION["is_login"])) {
        header("location: login.php");
    }

    $id = $_SESSION["user_id"];
    $message = "";

    if (isset($_POST["update"])) {
        $nama = $_POST["nama"];
        $no_hp = $_POST["no_hp"];
        $navbar = $_POST["navbar"];

        setcookie("navbar", $navbar, strtotime('+1 days'), '/');

        if (!empty($_POST["sandi"]) && !empty($_POST["confirmsandi"])) {
            if ($_POST["sandi"] == $_POST["confirmsandi"]) {
                $sandi = password_hash($_POST["sandi"], PASSWORD_DEFAULT);

                $query = "UPDATE user SET nama='$nama', no_hp=$no_hp, password='$sandi', WHERE id=$id";
                $update = mysqli_query($conn, $query);
                if ($update) {
                    $_SESSION["nama"] = $nama;
                    $message = "Profil berhasil diperbarui";
                }
            } else {
                $message = "Gagal: kata sandi dan konfirmasi kata sandi tidak sesuai!";
            }
        } else {
            $query = "UPDATE user SET nama='$nama', no_hp=$no_hp WHERE id=$id";
            $update = mysqli_query($conn, $query);
            if ($update) {
                $_SESSION["nama"] = $nama;
                $message = "Profil berhasil diperbarui";
            }
        }
    }

    $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
    $user = mysqli_fetch_assoc($result);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EAD Travel</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="style.css">

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!-- FONT AWESOME -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    </head>

    <body class="container">

        <?php if ($_COOKIE["navbar"] == "light") : ?>
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="container">
                <a class="navbar-brand mr-auto fw-bold" href="index.php">EAD Travel</a>
                    <ul class="navbar-nav left">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php else : ?>
            <nav class="navbar navbar-expand-sm navbar-light bg-nav">
                <div class="container">
                <a class="navbar-brand mr-auto fw-bold" href="index.php">EAD Travel</a>
                        <ul class="navbar-nav left">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php endif; ?> 

        <?php if ($message) : ?>
                <?php if (strpos($message, "berhasil")) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $message ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php else : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $message ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
        <?php endif; ?>

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="text-center pt-3">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="email" value="<?= $user["email"] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user["nama"] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="no_hp" class="col-sm-3 col-form-label">Nomor Handphone</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $user["no_hp"] ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row mb-3">
                                <label for="sandi" class="col-sm-3 col-form-label">Kata Sandi</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="sandi" name="sandi">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="confirmsandi" class="col-sm-3 col-form-label">Konfirmasi Kata Sandi</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="confirmsandi" name="confirmsandi">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="navbar" class="col-sm-3 col-form-label">Warna Navbar</label>
                                <div class="col-sm-3">
                                    <select id="navbar" name="navbar" class="form-control">
                                        <option value="default">Default</option>
                                        <option value="light">Light</option>
                                    </select>
                                </div>
                            </div>
                            <div class='text-center pt-2'>
                                <button type="submit" name="update" class="btn btn-primary btn-block col-1">Simpan</button>
                                <a class="btn btn-secondary btn-warning col-1" href="index.php" role="button">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="footer bg-nav pt-3">
            <p>&copy; 2021 Copyright: <a class='link-primary' data-toggle="modal" data-target="#footer">NAMA_NIM</a></p>
        </div>

        <!--Modal: Footer-->
        <div class="modal fade" id="footer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-s">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Created by</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ps-5 pe-5">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>Hanif Muflihul Anwar</td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                                <td>1202194185</td>
                            </tr>
                        </table>
                    </div>   
                </div>
            </div>   
        </div>  

    </body>

    </html>