<?php
include_once("./models/timeslots.php");

$id = $_REQUEST["id_timeslot"];
$timeslot = TimeSlot::formModTimeSlot($id);

echo "<h1 class='text-center'>Modificar Tramo Horario</h1>";
foreach ($timeslot as $result) {
    $id = $result['idTimeSlot'];
    $dayofWeek = $result['dayOfWeek'];
    $startTime = $result['startTime'];
    $endTime = $result['endTime'];

    echo "<form action='index.php?controller=timeslotsController&action=ProcessModifyTimeSlot' method='post' enctype='multipart/form-data'>";
    echo "<div class='flex-column d-flex'>";
    echo "<div class='form-group p-2'>";
    echo "<input type='hidden' name='timeslot_id' id='timeslot_id' value='$id'";
    echo "<label for='timeslot_dayofWeek'>Dia de la Semana:</label>";
    echo "<select class='form-control' id='timeslot_dayofWeek' name='timeslot_dayofWeek' placeholder='$dayofWeek'>";
    echo "<option>Lunes</option>";
    echo "<option>Martes</option>";
    echo "<option>Miercoles</option>";
    echo "<option>Jueves</option>";
    echo "<option>Viernes</option>";
    echo "</select>";
    echo "</div>";

    echo "<div class='form-group p-2'>";
    echo "<label for='timeslot_startTime'>Hora Inicio:</label>";
    echo "<input type='time' class='form-control' name='timeslot_startTime' id='timeslot_starTime' value='$startTime'>";
    echo "</div>";

    echo "<div class='form-group p-2'>";
    echo "<label for='timeslot_endTime'>Hora Fin:</label>";
    echo "<input type='time' class='form-control' name='timeslot_endTime' id='timeslot_endTime' value='$endTime'>";
    echo "</div>";
    echo "</div>";
    echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
    echo "<input type='submit' class='btn btn-primary p-2 mt-3' value='Modificar Tramo Horario'>";
    echo "</div>";
    echo "</form>";
}
