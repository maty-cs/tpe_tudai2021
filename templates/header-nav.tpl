<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="css/index_ver2-4.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,100;1,300&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">

</head>
<body>
    <header id="home">
        
        <section class="reposteria">
            <div>
            <h2><a href="logout">Inicia sesión</a></h2>
            </div>
            
            <div>
            <h2><a href="logout">Cierra sesión</a></h2>
            </div>

            <div>
            {if isset($users)}
                {foreach from=$users item=$user}
                    {if $user->admin == 1}
                        {$rol = $user->admin}
                    {/if}
                {/foreach}
                {if isset($rol)}
                    <h2><a href="adminSessions">Administrar Cuentas</a></h2>
                {/if}
                
            {/if}
            </div>
        </section>

        <div class="contenedor">
            <h1 class="titulo">Pastelería Guille</h1>
            <p>¡Hacemos la delicia que vos pidas!</p>
        </div>
        
    </header>