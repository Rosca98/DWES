<?php
if (isset($data['errorMsg'])) {
    echo "<p style='color:red'>" . $data['errorMsg'] . "</p>";
}
if (isset($data['infoMsg'])) {
    echo "<p style='color:blue'>" . $data['infoMsg'] . "</p>";
}

echo "<form method='post' action='index.php?controller=userController&action=processLoginForm'>";
echo "<div class='mb-3 mt-3'>";
echo "<label for='username' class='form-label'>Username:</label>";
echo "<input type='username' class='form-control' id='username' placeholder='Introduce el usuario' name='username'>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<label for='password' class='form-label'>Password:</label>";
echo "<input type='password' class='form-control' id='password' placeholder='Introduce la contraseña' name='password'>";
echo "</div>";
echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
echo "<input type='hidden' name='action' value='processLoginForm'>";
echo "<input type='submit' value='Login' class='btn btn-primary'>";
echo "</div>";
echo "</form>";

echo "<br><form method='post' action='index.php?controller=userController&action=showAddUser'>";
echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
echo "<button class='btn btn-primary' type='submit'>Registrarse</button>";
echo "</div>";
echo "</form>";
