<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Reseva de Recursos Informaticos</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08"
        aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="navbar-brand" href="https://iescelia.org/web/">
                    <img src="../assets/img/escudoCelia.png" width="50" height="50" alt="">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light"
                    href="index.php?controller=userController&action=showUserList">Usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light"
                    href="index.php?controller=resourceController&action=showResourcesList">Recursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light"
                    href="index.php?controller=timeslotsController&action=showTimeSlotList">Horario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light"
                    href="index.php?controller=reservationController&action=showReservationList">Reservas</a>
            </li>
        </ul>
    </div>
</nav>

<body>