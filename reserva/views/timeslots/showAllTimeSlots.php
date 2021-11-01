<?php
include_once("models/timeslots.php");

echo "<h1 class='text-center'>Lista de TimeSlots</h1>";
echo "<div class='container-sm pt-5'>";
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th class='text-center' scope='col'>DayOfWeek</th>";
echo "<th class='text-center' scope='col'>StartTime</th>";
echo "<th class='text-center' scope='col'>EndTime</th>";
echo "<th class='text-center' scope='col'>Acciones</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$timeslot = TimeSlot::TimeSlotsList();

foreach ($timeslot as $result) {
    $id = $result['idTimeSlot'];
    $dayofWeek = $result['dayOfWeek'];
    $startTime = $result['startTime'];
    $endTime = $result['endTime'];

    echo "<tr>";
    echo "<td class='text-center' scope='row'>$dayofWeek</td>";
    echo "<td class='text-center'>$startTime</td>";
    echo "<td class='text-center'>$endTime</td>";
    echo "<td>";
    echo "<div class='d-flex flex-row justify-content-around'>";
    echo "<div class='d-flex'>";
    echo "<form method='post' action='index.php?controller=timeslotsController&action=showModTimeslot'>";
    echo "<input type='hidden' id='id_timeslot' name='id_timeslot' value='$id'>";
    echo "<input type='submit' class='btn btn-primary' value='Modificar'>";
    echo "</form>";
    echo "</div>";
    echo "<div class='d-flex'>";
    echo "<form method='post' action='index.php?controller=timeslotsController&action=eliminarTimeslot'>";
    echo "<input type='hidden' id='id_timeslot' name='id_timeslot' value='$id'>";
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

echo "<br><form method='post' action='index.php?controller=timeslotsController&action=showAddTimeslot'>";
echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
echo "<button class='btn btn-primary' type='submit'>Añadir nuevo</button>";
echo "</div>";
echo "</form>";
