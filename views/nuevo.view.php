<?php require 'header.component.php'; ?>
    <div class="contenedor">
        <div class="post">
            <article>
                <h2 class="titulo">Publicar un nuevo articulo</h2>
                <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Titulo" name="titulo">
                    <input type="text" placeholder="Extracto" name="extracto">
                    <textarea name="texto" placeholder="Texto"></textarea>
                    <input type="file" name="thumb">
                    <input type="submit" value="Publicar articulo">
                </form>
            </article>
        </div>
    </div>
</body>
</html>