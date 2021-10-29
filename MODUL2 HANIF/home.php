    <!DOCTYPE html>

    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>ESD Venue</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>

        <section id="Nav">
            <ul class="nav bg-dark justify-content-center p-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booking.php">Booking</a>
                </li>
            </ul>
        </section>
        <section id="Home">
            <div class="container justify-content-center">
                <center><h4 class="m-4">WELCOME TO ESD VENUE RESERVATION</h4></center>
                <div class="bg-dark p-2"><div class="subjudul">Find your best deal for your event, here!</div></div>
                
                <form action="booking.php" method="POST">
                <div class="row align-items-center pt-3">
                    <div class="col">
                        <div class="card" style="width: auto;">
                            <img src="img-1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Nusantara Hall</h5>
                                <p class="card-text">
                                    $2000 / hour <br>
                                    5000 Capacity
                                </p>
                            </div>
                            <ul class="list-group list-group-flush align-center fw-bold">
                                <li class="list-group-item on">Free Parking</li>
                                <li class="list-group-item on">Full AC</li>
                                <li class="list-group-item on">Cleaning Service</li>
                                <li class="list-group-item on">Covid-19 Helath Protocol</li>
                            </ul>
                            <div class="card-body-button align-center">
                                <button type="submit" name="nama_gedung" value="Nusantara Hall" class="btn btn-primary">Book Now</button>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col">

                        <div class="card" style="width: auto;">
                            <img src="img-2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Garuda Hall</h5>
                                <p class="card-text">
                                    $1000 / hour <br>
                                    2000 Capacity
                                </p>
                            </div>
                            <ul class="list-group list-group-flush align-center fw-bold">
                                <li class="list-group-item on">Free Parking</li>
                                <li class="list-group-item on">Full AC</li>
                                <li class="list-group-item off">No Cleaning Service</li>
                                <li class="list-group-item on">Covid-19 Helath Protocol</li>
                            </ul>
                            <div class="card-body-button align-center">
                                <button type="submit" class="btn btn-primary" name="nama_gedung" value="Garuda Hall">Book Now</button>
                            </div>
                        </div>

                    </div>
                    <div class="col">

                        <div class="card" style="width: auto;">
                            <img src="img-3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Gedung Serba Guna</h5>
                                <p class="card-text">
                                    $500 / hour <br>
                                    500 Capacity
                                </p>
                            </div>
                            <ul class="list-group list-group-flush align-center fw-bold">
                                <li class="list-group-item off">No Free Parking</li>
                                <li class="list-group-item off">No Full AC</li>
                                <li class="list-group-item off">No Cleaning Service</li>
                                <li class="list-group-item on">Covid-19 Helath Protocol</li>
                            </ul>
                            <div class="card-body-button align-center">
                                <button type="submit" class="btn btn-primary" name="nama_gedung" value="Gedung Serba Guna">Book Now</button>
                            </div>
                        </div>

                    </div>
                </div>
                </form>
            </div>
        </section>
        
        <section>
        <div class="footer py-3 bg-light mt-10">
            <div class="container">
                created by Hanif_1202194185
            </div>
        </div>
        </section>

        </body>
    </html>