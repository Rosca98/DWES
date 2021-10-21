<?php
include_once ("./models/users.php");
//Mostramos una lista con diferentes recursos que tengamos listados
echo "
    <h1 class='text-center'>Lista de Usuarios</h1>
    <div class='container-sm pt-5'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th class='text-center' scope='col'>Username</th>
                <th class='text-center' scope='col'>Password</th>
                <th class='text-center' scope='col'>Realname</th>
                <th class='text-center' scope='col'>Type</th>
                <th class='text-center' scope='col'>Acciones</th>
            </tr>
        </thead>
        <tbody>
    ";

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
                echo "<form method='post' action='index.php?action=showModUser'>";
                    echo "<input type='hidden' id='id_user' name='id_user' value='$id'>";
                    echo "<input type='submit' class='btn btn-primary' value='Modificar'>";
                echo "</form>";
                echo "</div>";
                echo "<div class='d-flex'>";
                echo "<form method='post' action='index.php?action=eliminarUser'>";
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

echo "<br><form method='post' action='index.php?action=showAdduser'>";
    echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
    echo "<button class='btn btn-primary' type='submit'>Añadir nuevo</button>";
    echo "</div>";
echo "</form>";

?>