<?php

$conn = mysqli_connect("localhost", "root", "", "wad_modul4");

if (!$conn) {
    echo "
    <script>
        alert('failed connect into database')
    </script>"
    ;
}