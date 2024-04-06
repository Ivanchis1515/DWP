<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../css/dashboard.css"/>
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <title>Cliente</title>
</head>
<body>
    
    <section id="sideMenu" >
        <nav>
            <a href="#" class="active">
                <i class="fa fa-home" aria-hidden="true"></i>Home
            </a>
            <a href="#">
                <i class="fa fa-sticky-note-o" aria-hidden="true"></i> What's New
            </a>
            <a href="#">
                <i class="fa fa-bookmark-o" aria-hidden="true"></i> Get Started
            </a>
            <a href="#">
                <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Accessiblity
            </a>
            <a href="#">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> Community
            </a>
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> License
            </a>
        </nav>
    </section>

    <header>
        <div class="search-area">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text">
        </div>
        <div class="user-area">
            <a href="#">+ Add</a>
            <a href="#" class="notification">
                <i class="fa fa-bell-o" aria-hidden="true"></i>
                <span class="circle">3</span>
            </a>
            <a href="#">
                <div class="user-img"></div>
                <i class="fa fa-caret-down" aria-hidden="true"></i>
            </a>
        </div>
    </header>

    <div class="container">
        <?php
            include("funciones.php");
            if(verificar()){
                echo "<h1>Hola</h1>";
                echo "<label>Hola $_SESSION[usuario]</label><br/>";
                echo "<a href='salir.php'>Cerrar sesión aquí</a>";
            }
            else{
                header("Location: ../sesion.html");
            }
        ?>
    </div>

</body>
</html>