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
    <input type='hidden' name='action' value='processLoginForm'>
    <input type='submit' class='btn btn-primary'>Submit</input>
</form>";