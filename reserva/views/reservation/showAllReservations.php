<?php
include_once ("./models/reservation.php");
include_once ("./models/resources.php");
include_once ("./models/users.php");
include_once ("./models/timeslots.php");
include_once ("./models/security.php");


$reserva = Reservation::ReservationList();

if(Security::thereIsSession()){
    echo "<h1 class='text-center'>Lista de Reservas</h1>";
    echo "<div class='container-sm pt-5'>";
    echo "<table class='table table-striped'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th class='text-center' scope='col'>Recurso</th>";
                echo "<th class='text-center' scope='col'>Usuario</th>";
                echo "<th class='text-center' scope='col'>Dia</th>";
                echo "<th class='text-center' scope='col'>Hora</th>";
                echo "<th class='text-center' scope='col'>Remarks</th>";
                echo "<th class='text-center' scope='col'>Acciones</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

    foreach ($reserva as $result) {
        $id = $result['idReservation'];
        $idResource = $result['idResource'];
        $idUser = $result['idUser'];
        $idTimeSlot = $result['idTimeSlot'];
        $date = $result['date'];
        $remarks = $result['remarks'];
        
        $resourceName = Resource::getResourceName($idResource);
        $userName = User::getUserName($idUser);
        $day = TimeSlot::getTimeSlotDay($idTimeSlot);
        $startTime = TimeSlot::getStartTime($idTimeSlot);
        $endTime = TimeSlot::getEndTime($idTimeSlot);
        echo "<tr>";
            echo "<td class='text-center' scope='row'>$resourceName</td>";
            echo "<td class='text-center'>$userName</td>";
            echo "<td class='text-center'>$day</td>";
            echo "<td class='text-center'>De $startTime a $endTime</td>";
            echo "<td class='text-center'>$remarks</td>";
            echo "<td>";
            echo "<div class='d-flex flex-row justify-content-around'>";
                echo "<div class='d-flex'>";
                echo "<form method='post' action='index.php?controller=reservationController&action=eliminarReservation'>";
                    echo "<input type='hidden' id='id_reservation' name='id_reservation' value='$id'>";
                    echo "<input type='submit' class='btn btn-danger' value='Eliminar'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
echo "</table>";
echo "</div>";

echo "<br><form method='post' action='index.php?controller=reservationController&action=showAddReservation'>";
echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
echo "<button class='btn btn-primary' type='submit'>Añadir nuevo</button>";
echo "</div>";
echo "</form>";
}else{
    echo "
    <h1 class='text-center'>Lista de Reservas</h1>
    <div class='container-sm pt-5'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th class='text-center' scope='col'>Recurso</th>
                <th class='text-center' scope='col'>Usuario</th>
                <th class='text-center' scope='col'>Dia</th>
                <th class='text-center' scope='col'>Hora</th>
                <th class='text-center' scope='col'>Remarks</th>
            </tr>
        </thead>
        <tbody>
    ";
    foreach ($reserva as $result) {
        $id = $result['idReservation'];
        $idResource = $result['idResource'];
        $idUser = $result['idUser'];
        $idTimeSlot = $result['idTimeSlot'];
        $date = $result['date'];
        $remarks = $result['remarks'];
        
        $resourceName = Resource::getResourceName($idResource);
        $userName = User::getUserName($idUser);
        $day = TimeSlot::getTimeSlotDay($idTimeSlot);
        $startTime = TimeSlot::getStartTime($idTimeSlot);
        $endTime = TimeSlot::getEndTime($idTimeSlot);
        echo "<tr>";
            echo "<td class='text-center' scope='row'>$resourceName</td>";
            echo "<td class='text-center'>$userName</td>";
            echo "<td class='text-center'>$day</td>";
            echo "<td class='text-center'>De $startTime a $endTime</td>";
            echo "<td class='text-center'>$remarks</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
echo "<br><form method='post' action='index.php?controller=userController&action=showLoginForm'>";
    echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
    echo "<button class='btn btn-primary' type='submit'>Login</button>";
    echo "</div>";
echo "</form>";
echo "</table>";
echo "<br><form method='post' action='index.php?controller=userController&action=showAddUser'>";
    echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
    echo "<button class='btn btn-primary' type='submit'>Registrarse</button>";
    echo "</div>";
echo "</form>";
}

?>