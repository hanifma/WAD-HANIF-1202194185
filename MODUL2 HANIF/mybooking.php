    <?php
        $name = isset($_POST['name']) ? $_POST['name'] : '' ;
        $event_date = isset($_POST['event_date']) ? $_POST['event_date'] : '' ;
        $duration = isset($_POST['duration']) ? $_POST['duration'] : '' ;
        $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '' ;
        $checkin = date('d-m-yy', strtotime($event_date)) ." ". date('H:i:s', strtotime($start_time));
        $date = date('H:i:s', strtotime($start_time.' + '.$duration.' hours'));
        $checkout = date('d-m-yy', strtotime($event_date)) ." ". $date;
        $nama_gedung = isset($_POST['nama_gedung']) ? $_POST['nama_gedung'] : '' ;
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '' ;
        $catering = isset($_POST['catering']) ? $_POST['catering'] : '' ;
        $decoration = isset($_POST['decoration']) ? $_POST['decoration'] : '' ;
        $sound_system = isset($_POST['sound_system']) ? $_POST['sound_system'] : '' ;
        
        if($nama_gedung == "Nusantara Hall"){
            $total_price = $duration*2000;
        }else if($nama_gedung == "Garuda Hall"){
            $total_price = $duration*1000;
        }else{
            $total_price = $duration*500;
        }

        if (isset($_POST['add_service'])) {
            $add_service = $_POST['add_service'];
        }
        else {
            $add_service = '';
        }

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

            <div class="container text-center mt-5">
            <h4>
                Thank you <?= $name ?> for Reserving
            </h4>
            Please double check your reservation details

            <table class="table table-striped table-hover mt-5">
                <thead>
                    <tr>
                    <th scope="col">Booking Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Building Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Service</th>
                    <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?= rand(1,1000000)?></th>
                        <td><?= $name ?></td>
                        <td><?= $checkin ?></td>
                        <td><?= $checkout ?></td>
                        <td><?= $nama_gedung ?></td>
                        <td><?= $phone_number ?></td>
                        <td style="text-align: left;"> <ul>
                            <?php
                            if (empty($add_service)) {
                                echo '<ul>';
                                foreach ($add_service as $service) {
                                    if($service == "Catering") {
                                        $total_price += 700;
                                        echo '<li>' . $service . '</li>';
                                    }
                                    elseif($service == "Decoration") {
                                        $total_price += 450;
                                        echo '<li>' . $service . '</li>';
                                    }
                                    elseif($service == "Sound System") {
                                        $total_price += 250;
                                        echo '<li>' . $service . '</li>';
                                    }
                                    
                                }
                                echo '</ul>';
                            } else {
                                echo 'no service';
                            }
                            ?>
                        </ul></td>
                        <td><?= '$' . $total_price ?></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </section>
        <section class="mt-5 mt-5" style="padding-top: 430px;">
        <div class="footer py-3 bg-light">
            <div class="container">
                created by Hanif_1202194185
            </div>
        </div>
        </section>
        
        </body>
    </html>