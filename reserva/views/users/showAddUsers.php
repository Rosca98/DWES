<?php
echo "<h1 class='text-center'>Crear Nuevo Usuario</h1>";
echo "<form action='index.php?controller=userController&action=processAddUser' method='post' enctype='multipart/form-data'>";
echo "<div class='flex-column d-flex align-items-center'>";
echo "<div class='form-group'>";
echo "<label for='user_username'>Nombre de usuario:</label>";
echo "<input type='text' class='form-control' id='user_username' name='user_username' placeholder='Nombre'>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='user_password'>Contraseña:</label>";
echo "<input type='password' class='form-control' name='user_password' id='user_password' placeholder='Password'>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='user_realname'>Nombre Completo:</label>";
echo "<input type='text' class='form-control' name='user_realname' id='user_realname' placeholder='RealName'>";
echo "</div>";
echo "</div>";

echo "<div class='mt-2 d-flex align-items-center justify-content-center flex-wrap flex-column'>";
echo "<input type='submit' class='btn btn-success' value='Añadir nuevo Usuario'>";
echo "</div>";
echo "</form>";
