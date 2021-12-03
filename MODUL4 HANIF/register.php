    <?php
    session_start();
    include("config.php");

    if (isset($_SESSION["is_login"])) {
        header("location: index.php");
    }

    $message = "";
    if (isset($_POST["registe"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $no_hp = $_POST["no_hp"];
        $sandi = $_POST["sandi"];
        $confirmsandi = $_POST["confirmsandi"];

        if ($sandi == $confirmsandi) {
            $sandi = password_hash($_POST["sandi"], PASSWORD_DEFAULT);
            $confirmsandi = password_hash($_POST["confirmsandi"], PASSWORD_DEFAULT);
            $query = "SELECT email FROM user WHERE email='$email'";
            $result = mysqli_query($conn, $query);

            if (!$result->num_rows) {
                $query = "INSERT INTO user VALUES (NULL, '$nama', '$email', '$no_hp', '$sandi')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    $message = "Registrasi Berhasil";
                } else {
                    $message = "Gagal registrasi";
                }
            } else {
                $message = "Registrasi gagal: email sudah pernah didaftarkan!";
            }
        } else {
            $message = "Kata sandi dan konfirmasi kata sandi tidak sesuai!";
        }
    }

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

    </head>

    <body style="background-color: #fffbda;">
        <nav class="navbar navbar-expand-sm navbar-light bg-nav">
            <div class="container">
                <a class="navbar-brand mr-auto fw-bold" href="index.php">EAD Travel</a>
                    <ul class="navbar-nav left">
                        <li class="nav-item">
                            <a class="nav-link text-dark btn" href="register.php">Register</a>
                        </li>
                        &nbsp;
                        <li class="nav-item">
                            <a class="nav-link text-dark btn" href="login.php">Login</a>
                        </li>
                    </ul>
            </div>
        </nav>
        <?php if ($message) : ?>
        
                <?php if (strpos($message, "Berhasil")) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $message ?> Silakan <a class="alert-link" href="login.php"><strong>Login</strong></a>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php else : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $message ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
        <?php endif; ?>
        <div class="container mt-3">

            

            <div class="row">
                <div class="col">
                </div>

                <div class="col">
                    <div class="card m-3 p-3 align-self-center col d-flex justify-content-center" style="width: 24rem;">
                        <div class="card-body">
                            <form method="POST">
                                <h5 class='text-center'>Register</h5>
                                <hr/>
                                <div class="form-group">
                                    <label class='mt-3 mb-2' for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label class='mt-3 mb-2' for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Alamat E-Mail">
                                </div>
                                <div class="form-group">
                                    <label class='mt-3 mb-2' for="no_hp">Nomor Handphone</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone">
                                </div>
                                <div class="form-group">
                                    <label class='mt-3 mb-2' for="sandi">Kata Sandi</label>
                                    <input type="password" class="form-control" id="sandi" name="sandi" placeholder="Kata Sandi Anda">
                                </div>
                                <div class="form-group">
                                    <label class='mt-3 mb-2' for="confirmsandi">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control" id="confrmsandi" name="confirmsandi" placeholder="Konfirmasi Kata Sandi">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="register" class="col-6 m-3 btn btn-primary">Daftar</button>
                                </div>
                                <div class="form-group text-center">
                                    <span class="text-center">Anda sudah punya akun? <a href="login.php" class="text-primary">Login</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col">
                </div>

            </div>
                    
        </div>

        <div class="footer bg-nav pt-3">
            <p>&copy; 2021 Copyright: <a class='link-primary pe-auto' data-toggle="modal" data-target="#footer">NAMA_NIM</a></p>
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