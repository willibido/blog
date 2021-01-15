<?php require 'header.component.php'; ?>
    <div class="contenedor">
        <div class="post">
            <article>
                <h2 class="titulo">Editar Articulo</h2>
                <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                    <input type="text" placeholder="Titulo" name="titulo" value="<?php echo $post['titulo'] ?>">
                    <input type="text" placeholder="Extracto" name="extracto" value="<?php echo $post['extracto'] ?>">
                    <textarea name="texto" placeholder="Texto"><?php echo $post['texto'] ?></textarea>
                    <input type="file" name="thumb">
                    <input type="hidden" name="thumb-guardada" value="<?php echo $post['thumb'] ?>">
                    <input type="submit" value="Guardar cambios">
                </form>
            </article>
        </div>
    </div>
</body>
</html>