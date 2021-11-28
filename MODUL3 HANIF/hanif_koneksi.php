   <?php 
      $koneksi = mysqli_connect("localhost","root","","modul3");
      if(!$koneksi) {
         echo "<script>
               alert('failed connect into database')
               </script>";
      }
   ?>