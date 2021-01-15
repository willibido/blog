<?php require 'header.component.php'; ?>
    <div class="contenedor">
        <div class="post">
            <article>
                <h2 class="titulo">Inicio de sesion</h2>
                <form class="formulario" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="login">
                    <input type="text" placeholder="Nombre de usuario" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <input type="submit" value="Iniciar sesion">
                </form>
            </article>
        </div>
    </div>
</body>
</html>