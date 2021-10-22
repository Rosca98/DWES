<?php
include_once ("models/timeslots.php");
//Mostramos una lista con diferentes recursos que tengamos listados
echo "
    <h1 class='text-center'>Lista de TimeSlots</h1>
    <div class='container-sm pt-5'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th class='text-center' scope='col'>DayOfWeek</th>
                <th class='text-center' scope='col'>StartTime</th>
                <th class='text-center' scope='col'>EndTime</th>
                <th class='text-center' scope='col'>Acciones</th>
            </tr>
        </thead>
        <tbody>
    ";

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
                echo "<form method='post' action='index.php?action=showModTimeslot'>";
                    echo "<input type='hidden' id='id_timeslot' name='id_timeslot' value='$id'>";
                    echo "<input type='submit' class='btn btn-primary' value='Modificar'>";
                echo "</form>";
                echo "</div>";
                echo "<div class='d-flex'>";
                echo "<form method='post' action='index.php?action=eliminarTimeslot'>";
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

echo "<br><form method='post' action='index.php?action=showAddTimeslot'>";
    echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
    echo "<button class='btn btn-primary' type='submit'>Añadir nuevo</button>";
    echo "</div>";
echo "</form>";

?>