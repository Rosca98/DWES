<?php
if (empty($data)) {
    echo "<form action='index.php?controller=reservationController&action=ProcessAddReservation' method='post' enctype='multipart/form-data'>";
    echo "<div class='form-group'>";
    echo "<label for='user_name'>Usuario:</label>";
    echo "<select class='form-control' id='user_id' name='user_id' placeholder='username'>";
    echo "<option disabled selected>Elige el usuario</option>";
    User::showAllUsers();
    echo "</select>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='resource_name'>Nombre de recurso:</label>";
    echo "<select class='form-control' id='resource_id' name='resource_id' placeholder='resource'>";
    echo "<option disabled selected>Elige el recurso</option>";
    Resource::showAllResources();
    echo "</select>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='resource_name'>Tramo Horario:</label>";
    echo "<select class='form-control' id='timeslot_id' name='timeslot_id' placeholder='dayofWeek'>";
    echo "<option disabled selected>Elige el recurso</option>";
    TimeSlot::showAllTimeSlots();
    echo "</select>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='remarks'>Remarks:</label>";
    echo "<input type='text' class='form-control' name='remarks' id='remarks' placeholder='Remarks'>";
    echo "</div>";
    echo "</div>";
    echo "<div>";
    echo "<input type='submit' value='Modificar TimeSlot'>";
    echo "</div>";
    echo "</form>";
} else {
    $error = 'Ya existe una reserva para ese recurso en esa hora, por favor, prueba otra';
    echo "<script type='text/javascript'>alert('$error');</script>";
    echo "<form action='index.php?controller=reservationController&action=ProcessAddReservation' method='post' enctype='multipart/form-data'>";
    echo "<div class='form-group'>";
    echo "<label for='user_name'>Usuario:</label>";
    echo "<select class='form-control' id='user_id' name='user_id' placeholder='username'>";
    echo "<option disabled selected>Elige el usuario</option>";
    User::showAllUsers();
    echo "</select>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='resource_name'>Nombre de recurso:</label>";
    echo "<select class='form-control' id='resource_id' name='resource_id' placeholder='resource'>";
    echo "<option disabled selected>Elige el recurso</option>";
    Resource::showAllResources();
    echo "</select>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='resource_name'>Tramo Horario:</label>";
    echo "<select class='form-control' id='timeslot_id' name='timeslot_id' placeholder='dayofWeek'>";
    echo "<option disabled selected>Elige el recurso</option>";
    TimeSlot::showAllTimeSlots();
    echo "</select>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='remarks'>Remarks:</label>";
    echo "<input type='text' class='form-control' name='remarks' id='remarks' placeholder='Remarks'>";
    echo "</div>";
    echo "</div>";
    echo "<div>";
    echo "<input type='submit' value='Modificar TimeSlot'>";
    echo "</div>";
    echo "</form>";
}
