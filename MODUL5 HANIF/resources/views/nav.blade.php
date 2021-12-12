<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vaksin Yu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        
    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3">
                <div class="container-fluid">
                <div class="d-md-flex d-block flex-row mx-md-auto mx-0">
                    <div class="navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active fw-bold' : '' }}" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ Request::is('vaksin') ? 'active fw-bold' : '' }}" href="/vaksin">Vaccine</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ Request::is('pasien') ? 'active fw-bold' : '' }}" href="/pasien">Patient</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </nav>

        @yield("target")

        <!-- Button trigger modal -->
        <footer class="container footer py-3" style="margin-top:700px;" data-bs-toggle="modal" data-bs-target="#footer">
            <center>Made with luff <a href="#" class="footer-name" data-bs-toggle="modal" data-bs-target="#footer"> Hanif Muflihul Anwar - 1202194185</a></center>
        </footer>

        <!-- Modal -->
        <div class="modal fade" id="footer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesan Pesan Praktikum </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Kesan : Luar biasa <br>
                Pesan : Tahun depan waktu pengerjaan 24jam saja kayaknya seru biar kaya hackathon hehehe
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
