<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="{BASE_URL}" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    </head>
                
    <body>

    <header>
        <li class="logo"><a href="/tp2/home"><h2 class="title">NewComerce</h2></a></li>
            <nav>
                <ul class="nav__links">
                    <li><a href="/tp2/getAllProducts">Productos</a></li>
                    <li><a href="/tp2/getAllCategories">Categorias</a></li>
                    <li><a href="/tp2/contact">Nosotros</a></li>
                    {if !empty($user_rol) && $user_rol == 'admin'}
                        <li><a href="adminUsers">Administrar Usuarios</a></li>
                    {/if}
                </ul>
            </nav>
            {if !empty($start) && $start == true}
                <a class="cta" href="logout" id="logout">Log out</a>
                {else}
                    <a class="cta" href="user">Loguearse</a>
                    <a class="cta" href="newUser">Registrarse</a>       
            {/if}
            <p class="menu cta">Menu</p>
        </header>
        <div id="mobile__menu" class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="getAllProducts">Products</a>
                <a href="getAllCategories">Categories</a>
                <a href="contact">About</a>
            </div>
        </div>

    <div class="conteiner">