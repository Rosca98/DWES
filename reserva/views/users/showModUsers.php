<?php
include_once("./models/users.php");

$id = $_REQUEST["id_user"];
$user = User::formModUser($id);

foreach ($user as $result) {
    $id = $result['idUser'];
    $username = $result['username'];
    $password = $result['password'];
    $realname = $result['realname'];

    echo "<form action='index.php?controller=userController&action=ProcessModifyUser' method='post' enctype='multipart/form-data'>";
    echo "<div class='form-group'>";
    echo "<input type='hidden' name='user_id' id='user_id' value='$id'";
    echo "<label for='user_username'>Usernama:</label>";
    echo "<input type='text' class='form-control' name='user_username' id='user_username' value='$username'>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<label for='user_password'>Password:</label>";
    echo "<input type='text' class='form-control' name='user_password' id='user_password' value='$password'>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<label for='user_realname'>Real name:</label>";
    echo "<input type='text' class='form-control' name='user_realname' id='user_realname' value='$realname'>";
    echo "</div>";

    echo "<div>";
    echo "<input type='submit' value='Modificar Usuario'>";
    echo "</div>";
    echo "</form>";
}
