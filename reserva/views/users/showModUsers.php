<?php
include_once("./models/users.php");

$id = $_REQUEST["id_user"];
$user = User::formModUser($id);

echo "<h1 class='text-center'>Modificar Usuario</h1>";
foreach ($user as $result) {
    $id = $result['idUser'];
    $username = $result['username'];
    $password = $result['password'];
    $realname = $result['realname'];

    echo "<form action='index.php?controller=userController&action=ProcessModifyUser' method='post' enctype='multipart/form-data'>";
    echo "<div class='flex-column d-flex align-items-center'>";
    echo "<div class='form-group'>";
    echo "<input type='hidden' name='user_id' id='user_id' value='$id'";
    echo "<label for='user_username'>Nombre de usuario:</label>";
    echo "<input type='text' class='form-control' name='user_username' id='user_username' value='$username'>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<label for='user_password'>Contraseña:</label>";
    echo "<input type='text' class='form-control' name='user_password' id='user_password' value='$password'>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<label for='user_realname'>Nombre completo:</label>";
    echo "<input type='text' class='form-control' name='user_realname' id='user_realname' value='$realname'>";
    echo "</div>";
    echo "</div>";

    echo "<div>";
    echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
    echo "<input class='btn btn-primary p-2 mt-3' type='submit' value='Modificar Usuario'>";
    echo "</div>";
    echo "</form>";
}
