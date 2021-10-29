    <?php
        $nama_gedung = isset($_POST['nama_gedung']) ? $_POST['nama_gedung'] : '' ;
    ?>

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
                <div class="bg-dark p-2 mt-3 mb-4"><div class="subjudul">Reserve your venue now!</div></div>

                <div class="card mb-3" style="width: 100%;">
                    <div class="row">
                        <div class="col-img">
                            <img src="
                                <? if($nama_gedung == 'Nusantara Hall') {
                                        echo 'img-1.jpg';
                                    }
                                    else if ($nama_gedung == 'Garuda Hall') {
                                        echo 'img-2.jpg';
                                    }
                                    else {
                                        echo 'img-3.jpg';
                                    }
                                ?>"                
                            class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col">
                        <div class="card-body">
                            <form action="mybooking.php" method="GET">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input  name="name" type="text" value="Hanif_1202194185" class="form-control" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Event Date</label>
                                    <input name="event_date" type="date" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Start Time</label>
                                    <input name="start_time" type="time" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Duration (Hours)</label>
                                    <input name="duration" type="number" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Building Type</label>
                                    
                                            <select name="nama_gedung"  class='form-select' aria-label="Default select example">
                                                <option selected disabled>Choose...</option>
                                                <option <?php if ($nama_gedung == 'Nusantara Hall') {echo "selected";} ?>  value="Nusantara Hall">Nusantara Hall</option>
                                                <option <?php if ($nama_gedung == 'Garuda Hall') {echo "selected";} ?> value="Garuda Hall">Garuda Hall</option>
                                                <option <?php if ($nama_gedung == 'Gedung Serba Guna') {echo "selected";} ?> value="Gedung Serba Guna">Gedung Serba Guna</option>
                                            </select>
                                                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                                    <input name="phone_number" type="number" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Add Service(s)</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="add_service[]" value="Catering" class="form-check-input" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Catering / $700
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input  type="checkbox" name="add_service[]" value="Decoration" class="form-check-input" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Decoration / $450
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input  type="checkbox"  name="add_service[]" value="Sound System" class="form-check-input" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Sound System / $250
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary booking">Book</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </section>

        <section id='footer'>
        <div class="footer py-3 bg-light">
            <div class="container">
                created by Hanif_1202194185
            </div>
        </div>
        </section>

        </body>
    </html>

