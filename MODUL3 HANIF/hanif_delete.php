    <?php
    include('hanif_koneksi.php');

    $id_buku = $_GET["id_buku"];
    $query = "DELETE FROM buku_table WHERE id_buku='$id_buku'";
    mysqli_query($koneksi, $query);

    header('Location: hanif_home.php')
    ?>