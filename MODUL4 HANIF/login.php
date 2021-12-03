    <?php
    session_start();
    include("config.php");

    if(isset($_SESSION["is_login"])) {
        header("location: index.php");
    }

    if(isset($_COOKIE["username"])) {
        header("location: index.php");
    }

    $message = "";
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $sandi = $_POST["sandi"];
        if(isset($_POST["remember_me"])) {
            $remember_me = TRUE;
        }else{
            $remember_me = FALSE;
        }
        
        $query = 'SELECT * FROM user WHERE email=$email';
        $result = mysqli_query($conn, $query);

        if ($result->num_rows == 0) {
            $message = "Gagal login: user tidak ditemukan";
        } else {
            $user = mysqli_fetch_assoc($result);
            if(password_verify($sandi, $user["password"])) {
                if($remember_me){
                    setcookie("email", $user["email"], strtotime('+1 days'), '/');
                }
                setcookie("navbar", "default", strtotime('+1 days'), '/');
                $_SESSION["is_login"] = TRUE;
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["nama"] = $user["nama"];
                header("location: index.php");
            }else{
                $message = "Gagal Login";
            }
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
                <div class="toast show align-items-center text-white bg-danger border-0 w-100" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?= $message ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>

        <div class="container mt-5">
        

            <div class="row">
                <div class="col">
                </div>

                <div class="col">
                    <div class="card m-3 p-3 align-self-center col d-flex justify-content-center" style="width: 24rem;"">
                        <div class="card-body">
                            <form method="POST">
                                <h5 class='text-center'>Login</h5>
                                <hr/>
                                <div class="form-group">
                                    <label class='mt-3 mb-2' for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Alamat E-Mail">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="sandi">Kata Sandi</label>
                                    <input type="password" class="form-control" id="sandi" name="sandi" placeholder="Kata Sandi Anda">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox'">
                                        <input class='mt-4 mb-2' type="checkbox" id="remember_me" name="remember_me">
                                        <label class="custom-control-label" for="remember_me">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group mt-3 text-center">
                                    <button type="submit" name="login" class="col-6 btn btn-primary btn-block">Login</button>
                                </div>
                                <br>
                                <div class="form-group text-center">
                                    <span class="text-center">Anda belum punya akun? <a href="register.php" class="text-primary">Registrasi</a></span>
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