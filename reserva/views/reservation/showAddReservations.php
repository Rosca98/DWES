<?php
include_once ("./models/reservation.php");
include_once ("./models/resources.php");
include_once ("./models/timeSlots.php");
include_once ("./models/users.php");

foreach ($resource_names as $result) {
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
    Resource::showAllResources();
    
        echo "<form action='index.php?controller=reservationController&action=ProcessModifyReservation' method='post' enctype='multipart/form-data'>";
        echo "<div class='form-group'>";
        echo "<label for='timeslot_dayofWeek'>Day of Week:</label>";
        echo "<select class='form-control' id='timeslot_dayofWeek' name='timeslot_dayofWeek' placeholder='dayofWeek'>
            <option>$result</option>
        </select>";
    echo "</div>";

        echo "<div>";
            echo "<input type='submit' value='Modificar Usuario'>";
        echo "</div>";
        echo "</form>";
    }
?>