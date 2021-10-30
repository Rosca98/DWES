<?php
    include_once ("./models/timeslots.php");

    $id = $_REQUEST["id_timeslot"];
    $timeslot = TimeSlot::formModTimeSlot($id);

    foreach ($timeslot as $result) {
        $id = $result['idTimeSlot'];
        $dayofWeek = $result['dayOfWeek'];
        $startTime = $result['startTime'];
        $endTime = $result['endTime'];
        
        echo "<form action='index.php?controller=timeslotsController&action=ProcessModifyTimeSlot' method='post' enctype='multipart/form-data'>";
        echo "<div class='form-group'>";
        echo "<input type='hidden' name='timeslot_id' id='timeslot_id' value='$id'";
        echo "<label for='timeslot_dayofWeek'>Day of Week:</label>";
        echo "<select class='form-control' id='timeslot_dayofWeek' name='timeslot_dayofWeek' placeholder='$dayofWeek'>
                <option>Lunes</option>
                <option>Martes</option>
                <option>Miercoles</option>
                <option>Jueves</option>
                <option>Viernes</option>
                </select>";
    echo "</div>";

        echo "<div class='form-group'>";
            echo "<label for='timeslot_startTime'>Start Time</label>";
            echo "<input type='time' class='form-control' name='timeslot_startTime' id='timeslot_starTime' value='$startTime'>";
        echo "</div>";
    
        echo "<div class='form-group'>";
            echo "<label for='timeslot_endTime'>End Time:</label>";
            echo "<input type='time' class='form-control' name='timeslot_endTime' id='timeslot_endTime' value='$endTime'>";
        echo "</div>";

        echo "<div>";
            echo "<input type='submit' value='Modificar TimeSlot'>";
        echo "</div>";
        echo "</form>";
    }
?>