    <?php

        include('hanif_koneksi.php');
        $query = "SELECT * FROM buku_table";
        $selects = mysqli_query($koneksi, $query);

    ?>

    <html>
        <head>
            <title>Perpustakaan EAD</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <nav class="navbar navbar-dark bg-dark p-3">
                <a href="hanif_home.php"><img src='logo-ead.png' style='height:30px;width:auto;' /></a>
                <a type="button" class="btn btn-primary" href='hanif_tambahbuku.php'>Tambah Buku</a>
            </nav>
            <div class='content_home'>
                <?php
                    $baris = mysqli_num_rows($selects);

                    if($baris==NULL) :
                ?>
                    <center class='mt-5'>
                        <h3>Belum Ada Buku</h3>
                        <hr style='color:blue;'>
                        Silahkan Menambahkan Buku
                    </center>

                <?php else : ?>
                    
                <div class="row">
                    <?php while ($select = mysqli_fetch_assoc($selects)) : ?>
                    <div class="col" style="width: auto;">
                        <div class="card" style="width:20rem;">
                            <img src="img/<?= $select['gambar']; ?>" class="card-img-top"  style="height:450px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $select['judul_buku']; ?></h5>
                                <p class="card-text"><?= $select['deskripsi']; ?></p>
                                <a href="hanif_detail.php?id_buku=<?= $select['id_buku'] ?>" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="footer">
                    <img src='logo-ead.png'/>
                    <h4>Perpustakaan EAD</h4>
                    &copy; Hanif_1202194185
                </div>
        </body>
    </html>