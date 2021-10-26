<?php
if (isset($data['errorMsg'])) {
    echo "<p style='color:red'>" . $data['errorMsg'] . "</p>";
}
if (isset($data['infoMsg'])) {
    echo "<p style='color:blue'>" . $data['infoMsg'] . "</p>";
}

echo"<form method='post' action='index.php?controller=userController&action=processLoginForm'>
    <div class='mb-3 mt-3'>
        <label for='username' class='form-label'>Username:</label>
        <input type='username' class='form-control' id='username' placeholder='Introduce el usuario' name='username'>
    </div>
    <div class='mb-3'>
        <label for='password' class='form-label'>Password:</label>
        <input type='password' class='form-control' id='password' placeholder='Introduce la contraseña' name='password'>
    </div>
    <div class='d-grid gap-2 d-md-flex justify-content-md-center'>
    <input type='hidden' name='action' value='processLoginForm'>
    <input type='submit' value='Login' class='btn btn-primary'>
    </div>
</form>";

echo "<br><form method='post' action='index.php?controller=userController&action=showAddUser'>";
    echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
    echo "<button class='btn btn-primary' type='submit'>Registrarse</button>";
    echo "</div>";
echo "</form>";