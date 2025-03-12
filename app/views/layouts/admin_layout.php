<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programas Formacion</title>
    <link rel="stylesheet" href="/css/styles_admin_layout.css">
    <link rel="stylesheet" href="/css/reset.css">
    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Aquí puedes agregar tus estilos para el modo oscuro */
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        /* Para el sidebar oculto */
        .sidebar-hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-content">
                <div class="logo">
                    <img src="" alt="">
                    <span class="logo-text">GymCPIC</span>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a href=""><i class="fas fa-building"></i><span>Centros</span></a></li>
                        <li><a href=""><i class="fas fa-cogs"></i><span>Programas</span></a></li>
                        <li><a href=""><i class="fas fa-users"></i><span>Grupo</span></a></li>
                        <li><a href=""><i class="fas fa-user-tag"></i><span>Roles</span></a></li>
                        <li><a href=""><i class="fas fa-user-shield"></i><span>Tipo Usuario</span></a></li>
                        <li><a href=""><i class="fas fa-user"></i><span>Usuario</span></a></li>
                        <li><a href=""><i class="fas fa-dumbbell"></i><span>Actividades</span></a></li>
                        <li><a href=""><i class="fas fa-calendar-check"></i><span>Reg Ingreso</span></a></li>
                        <li><a href=""><i class="fas fa-check-circle"></i><span>Control Prog</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="main-content">
            <header class="header">
                <div class="header-container">
                    <!-- Icono de menú (hamburger) para mostrar/ocultar el sidebar -->
                    <button class="menu-toggle" id="menu-toggle"><i class="fas fa-bars"></i></button>
                    <h1><?php echo $title; ?></h1>
                    <div class="search-container">Buscar ...</div>
                    <div class="header-icons">
                        <!-- Iconos para usuario, notificaciones, y modo oscuro -->
                        <button id="user-icon"><i class="fas fa-user"></i></button>
                        <button id="notification-icon"><i class="fas fa-bell"></i></button>
                        <button id="dark-mode-toggle"><i class="fas fa-moon"></i></button>
                    </div>
                </div>
            </header>
            <div class="content">
                <?php include_once $content ?>
            </div>
        </main>
    </div>

    <script>
        // Función para alternar el modo oscuro
        document.getElementById('dark-mode-toggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });

        // Función para mostrar/ocultar el sidebar
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('sidebar-hidden');
        });
    </script>
</body>
</html>