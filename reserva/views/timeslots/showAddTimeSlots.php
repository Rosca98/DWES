<?php
echo "<h1 class='text-center'>Añadir Tramo Horario</h1>";
echo "<form action='index.php?controller=timeslotsController&action=processAddTimeSlot' method='post' enctype='multipart/form-data'>";
echo "<div class='form-group p-2'>";
echo "<label for='timeslot_dayofWeek'>Dia de la Semana:</label>";
echo "<select class='form-control' id='timeslot_dayofWeek' name='timeslot_dayofWeek' placeholder='dayofWeek'>";
echo "<option>Lunes</option>";
echo "<option>Martes</option>";
echo "<option>Miercoles</option>";
echo "<option>Jueves</option>";
echo "<option>Viernes</option>";
echo "</select>";
echo "</div>";

echo "<div class='form-group p-2'>";
echo "<label for='timeslot_starTime'>Hora Inicio:</label>";
echo "<input type='time' class='form-control' name='timeslot_startTime' id='timeslot_starTime' placeholder='StarTime'>";
echo "</div>";

echo "<div class='form-group p-2'>";
echo "<label for='timeslot_endTime'>Hora Fin:</label>";
echo "<input type='time' class='form-control' name='timeslot_endTime' id='timeslot_endTime' placeholder='endTime'>";
echo "</div>";

echo "<div class='mt-2 d-flex align-items-center justify-content-center flex-wrap flex-column'>";
echo "<input type='submit' class='btn btn-success' value='Añadir Tramo Horario'>";
echo "</div>";
echo "</form>";
