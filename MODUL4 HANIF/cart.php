    <?php
    session_start();
    include("config.php");

    if (!isset($_SESSION["is_login"])) {
        header("location: login.php");
    }

    $user_id = $_SESSION["user_id"];
    $message = "";
    if (isset($_POST["delete"])) {
        $id = $_POST["id"];

        mysqli_query($conn, "DELETE FROM booking WHERE id=$id");
        $message = "Berhasil dihapus";
        header("location: cart.php");
    }

    $daftar_tempat = mysqli_query($conn, "SELECT * FROM booking WHERE user_id='$user_id'");

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

    <body style="background-color: #fffbda;">

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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $message ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

        <div class="container mt-4">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Tempat</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Tanggal Perjalanan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            $total = 0; ?>
                            <?php while ($select = mysqli_fetch_assoc($daftar_tempat)) : ?>
                                <?php $total += $select["harga"]; ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $select["nama_tempat"]; ?></td>
                                    <td><?= $select["lokasi"]; ?></td>
                                    <td><?= $select["tanggal"]; ?></td>
                                    <td>Rp<?= number_format($select["harga"]); ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?= $select["id"] ?>">
                                            <button type=" submit" name="delete" class="btn btn-danger" onclick="return confirm('Apa kamu yakin?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                            <tr>
                                <td colspan="4" class="fw-bold">Total</td>
                                <td colspan="2" class="fw-bold">Rp<?= number_format($total); ?></td>
                            </tr>
                        </tbody>
                    </table>
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