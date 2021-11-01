<?php
include_once("./models/users.php");

echo "<h1 class='text-center'>Lista de Usuarios</h1>";
echo "<div class='container-sm pt-5'>";
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th class='text-center' scope='col'>Usuario</th>";
echo "<th class='text-center' scope='col'>Contraseña</th>";
echo "<th class='text-center' scope='col'>Nombre Completo</th>";
echo "<th class='text-center' scope='col'>Tipo de Usuario</th>";
echo "<th class='text-center' scope='col'>Acciones</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$user = User::UserList();

foreach ($user as $result) {
    $id = $result['idUser'];
    $username = $result['username'];
    $password = $result['password'];
    $realname = $result['realname'];
    $type = $result['type'];

    echo "<tr>";
    echo "<td class='text-center' scope='row'>$username</td>";
    echo "<td class='text-center'>$password</td>";
    echo "<td class='text-center'>$realname</td>";
    echo "<td class='text-center'>$type</td>";
    echo "<td>";
    echo "<div class='d-flex flex-row justify-content-around'>";
    echo "<div class='d-flex'>";
    echo "<form method='post' action='index.php?controller=userController&action=showModUser'>";
    echo "<input type='hidden' id='id_user' name='id_user' value='$id'>";
    echo "<input type='submit' class='btn btn-primary' value='Modificar'>";
    echo "</form>";
    echo "</div>";
    echo "<div class='d-flex'>";
    echo "<form method='post' action='index.php?controller=userController&action=eliminarUser'>";
    echo "<input type='hidden' id='id_user' name='id_user' value='$id'>";
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

echo "<br><form method='post' action='index.php?controller=userController&action=showAddUser'>";
echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
echo "<button class='btn btn-primary' type='submit'>Añadir nuevo Usuario</button>";
echo "</div>";
echo "</form>";
