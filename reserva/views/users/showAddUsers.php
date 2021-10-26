<?php
echo "<form action='index.php?controller=userController&action=processAddUser' method='post' enctype='multipart/form-data'>";
    echo "<div class='form-group'>";
        echo "<label for='user_username'>Username:</label>";
        echo "<input type='text' class='form-control' id='user_username' name='user_username' placeholder='Nombre'>";
    echo "</div>";

    echo "<div class='form-group'>";
        echo "<label for='user_password'>Password:</label>";
        echo "<input type='text' class='form-control' name='user_password' id='user_password' placeholder='Password'>";
    echo "</div>";

    echo "<div class='form-group'>";
        echo "<label for='user_realname'>RealName:</label>";
        echo "<input type='text' class='form-control' name='user_realname' id='user_realname' placeholder='RealName'>";
    echo "</div>";

    echo "<div class='mt-2 d-flex align-items-center justify-content-center flex-wrap flex-column'>";
        echo "<input type='submit' class='btn btn-success' value='Añadir Usuario'>";
    echo "</div>";
echo "</form>";

?>