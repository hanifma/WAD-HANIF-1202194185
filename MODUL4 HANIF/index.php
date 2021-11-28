<?php
session_start();
include("config.php");

$message = "";
if (isset($_POST["tambah"])) {
    $nama_tempat = $_POST["nama_tempat"];
    $user_id = $_SESSION["user_id"];
    $harga = $_POST["harga"];
    $lokasi = $_POST["lokasi"];
    $tanggal = $_POST["tanggal"];

    $query = "INSERT INTO booking VALUES (NULL, $user_id, '$nama_tempat', '$lokasi', $harga, '$tanggal')";
    $result = mysqli_query($conn, $query);

    $message = "Berhasil memesan tiket";
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

    <!-- FONT AWESOME -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body style="background-color: #fffbda;">
<?php
    if (isset($_SESSION["is_login"])) {
?>
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

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Login
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>

        <?php if ($message) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $message ?>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>   

    <div class="container mt-3">
        <table>
            <thead class="text-center" style="background-color: #2ECC71;">
                <tr class="mb-3">
                    <th colspan=3 height="100px">
                        <h3>EAD Travel</h3>
                    </th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <tr>
                    <td class="p-1">
                        <div class="card">
                                <img class="card-img-top" src="img/raja_ampat.jpg" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">Raja Ampat, Papua</h5>
                                    <p class="card-text">Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Kepala Burung Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat.</p>
                                    <hr>
                                    <b>Rp. 7.000.000</b>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#pesan_rajaampat">Pesan Tiket</button>                                   
                                    </div>
                                </div>
                        </div>
                    </td>
                    <td class="p-1">
                        <div class="card">
                                <img class="card-img-top" src="img/bromo.jpg" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">Gunung Bromo, Malang</h5>
                                    <p class="card-text">Gunung Bromo atau dalam bahasa Tengger dieja "Brama", adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten.</p>
                                    <hr>
                                    <b>Rp. 2.000.000</b>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#pesan_gunungbromo">Pesan Tiket</button>                                   
                                    </div>
                                </div>
                        </div>
                    </td>
                    <td class="p-1">
                        <div class="card">
                                <img class="card-img-top" src="img/tanah_lot.jpg" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">Tanah Lot, Bali</h5>
                                    <p class="card-text">Pura Tanah Lot adalah salah satu Pura yang sangat disucikan di Bali, Indonesia. Di sini ada dua pura yang terletak di atas batu besar. Satu terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu.</p>
                                    <hr>
                                    <b>Rp. 5.000.000</b>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#pesan_tanahlot">Pesan Tiket</button>                                   
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
    </div>

    <div class="footer bg-nav pt-3">
        <p>&copy; 2021 Copyright: <a class='link-primary' data-toggle="modal" data-target="#footer">NAMA_NIM</a></p>
    </div>

    
    
    <!--Modal: Pesan Tanah Lot-->
    <div class="modal fade" id="pesan_tanahlot" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-s">
            <div class="modal-content p-2">
                <form method="POST">
                <div class="modal-body">
                    <label>Tanggal Perjalanan</label>
                    <input type="hidden" name="nama_tempat" value="Tanah Lot">
                    <input type="hidden" name="lokasi" value="Bali">
                    <input type="hidden" name="harga" value="5000000">
                    <input class='form-control mt-2' type="date" name="tanggal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal" aria-label="Close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name='tambah' class="btn btn-primary">Tambahkan</button>
                </div>
                </form>
            </div>
        </div>   
    </div>  

    <!--Modal: Pesan Tanah Lot-->
    <div class="modal fade" id="pesan_gunungbromo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-s">
            <div class="modal-content p-2">
                <form method="POST">
                <div class="modal-body">
                    <label>Tanggal Perjalanan</label>
                    <input type="hidden" name="nama_tempat" value="Gunung Bromo">
                    <input type="hidden" name="lokasi" value="Malang">
                    <input type="hidden" name="harga" value="2000000">
                    <input class='form-control mt-2' type="date" name="tanggal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal" aria-label="Close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name='tambah' class="btn btn-primary">Tambahkan</button>
                </div>
                </form>
            </div>
        </div>   
    </div>  

    <!--Modal: Pesan Tanah Lot-->
    <div class="modal fade" id="pesan_rajaampat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-s">
            <div class="modal-content p-2">
                <form method="POST">
                <div class="modal-body">
                    <label>Tanggal Perjalanan</label>
                    <input type="hidden" name="nama_tempat" value="Raja Ampat">
                    <input type="hidden" name="lokasi" value="Papua">
                    <input type="hidden" name="harga" value="7000000">
                    <input class='form-control mt-2' type="date" name="tanggal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal" aria-label="Close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name='tambah' class="btn btn-primary">Tambahkan</button>
                </div>
                </form>
            </div>
        </div>   
    </div>  

    <!--Belom Login Nich-->
<?php }else{ ?>
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
            <div class="row justify-content-center">
                <div class="alert alert-warning w-100 ms-3" width='auto' style="background-color: #BEF5D5;" role="alert">
                    <?= $message ?>
                </div>
            </div>
        <?php endif; ?>   
    <div class="container mt-3">
        <table>
            <thead class="text-center" style="background-color: #2ECC71;">
                <tr class="mb-3">
                    <th colspan=3 height="100px">
                        <h3>EAD Travel</h3>
                    </th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <tr>
                    <td class="p-1">
                        <div class="card">
                                <img class="card-img-top" src="img/raja_ampat.jpg" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">Raja Ampat, Papua</h5>
                                    <p class="card-text">Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Kepala Burung Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat.</p>
                                    <hr>
                                    <b>Rp. 7.000.000</b>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#belomlogin">Pesan Tiket</button>                                    
                                    </div>
                                </div>
                        </div>
                    </td>
                    <td class="p-1">
                        <div class="card">
                                <img class="card-img-top" src="img/bromo.jpg" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">Gunung Bromo, Malang</h5>
                                    <p class="card-text">Gunung Bromo atau dalam bahasa Tengger dieja "Brama", adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten.</p>
                                    <hr>
                                    <b>Rp. 2.000.000</b>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#belomlogin">Pesan Tiket</button>                                   
                                    </div>
                                </div>
                        </div>
                    </td>
                    <td class="p-1">
                        <div class="card">
                                <img class="card-img-top" src="img/tanah_lot.jpg" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">Tanah Lot, Bali</h5>
                                    <p class="card-text">Pura Tanah Lot adalah salah satu Pura yang sangat disucikan di Bali, Indonesia. Di sini ada dua pura yang terletak di atas batu besar. Satu terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu.</p>
                                    <hr>
                                    <b>Rp. 5.000.000</b>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#belomlogin">Pesan Tiket</button>                                   
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
    </div>

    <div class="footer bg-nav pt-3">
        <p>&copy; 2021 Copyright: <a class='link-primary' data-toggle="modal" data-target="#footer">NAMA_NIM</a></p>
    </div>


    <?php } ?>

    <!--Modal: Login Dulu-->
    <div class="modal fade" id="belomlogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-s">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ups...</h5>
                </div>
                <div class="modal-body">
                    <label>Sebelum pesan tiket harus login dulu gan.</label>
                    <br><a href='login.php' type='button' class="btn btn-primary mt-2">Yuhuu!</a>
                </div>   
            </div>
        </div>   
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