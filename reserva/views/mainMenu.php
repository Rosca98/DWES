<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExample08' aria-controls='navbarsExample08' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse justify-content-md-center' id='navbarsExample08'>
        <ul class='navbar-nav'>
            <li class='nav-item active'>
                <a class='navbar-brand' href='https://iescelia.org/web/'>
                    <img src='./assets/img/escudoCelia.png' width='75px' height='75px' alt=''>
                </a>
            </li>
            <?php
            if (User::isAdmin()) {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link fw-bold text-light fs-4' href='index.php?controller=userController&action=showUserList'>Usuario</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link fw-bold text-light fs-4' href='index.php?controller=resourceController&action=showResourcesList'>Recursos</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link fw-bold text-light fs-4'
                        href='index.php?controller=timeslotsController&action=showTimeSlotList'>Horario</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link fw-bold text-light fs-4'
                        href='index.php?controller=reservationController&action=showReservationList'>Reservas</a>";
                echo "</li>";
                echo "</ul>";
                echo "</div>";
                echo "</nav>";
            } else if (Security::thereIsSession()) {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link fw-bold text-light fs-4'
                    href='index.php?controller=reservationController&action=showReservationList'>Reservas</a>";
                echo "</li>";
                echo "</ul>";
                echo "</div>";
                echo "</nav>";
            } else {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link fw-bold text-light fs-4'
                    href='index.php?controller=reservationController&action=showReservationList'>Reservas</a>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</nav>