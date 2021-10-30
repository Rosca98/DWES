<?php
echo "<form action='index.php?controller=timeslotsController&action=processAddTimeSlot' method='post' enctype='multipart/form-data'>";
    echo "<div class='form-group'>";
        echo "<label for='timeslot_dayofWeek'>Day of Week:</label>";
        echo "<select class='form-control' id='timeslot_dayofWeek' name='timeslot_dayofWeek' placeholder='dayofWeek'>
                <option>Lunes</option>
                <option>Martes</option>
                <option>Miercoles</option>
                <option>Jueves</option>
                <option>Viernes</option>
                </select>";
    echo "</div>";

    echo "<div class='form-group'>";
        echo "<label for='timeslot_starTime'>Start Time:</label>";
        echo "<input type='time' class='form-control' name='timeslot_startTime' id='timeslot_starTime' placeholder='StarTime'>";
    echo "</div>";

    echo "<div class='form-group'>";
        echo "<label for='timeslot_endTime'>End Time:</label>";
        echo "<input type='time' class='form-control' name='timeslot_endTime' id='timeslot_endTime' placeholder='endTime'>";
    echo "</div>";

    echo "<div class='mt-2 d-flex align-items-center justify-content-center flex-wrap flex-column'>";
        echo "<input type='submit' class='btn btn-success' value='Añadir Usuario'>";
    echo "</div>";
echo "</form>";

?>