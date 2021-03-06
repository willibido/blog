<?php require 'header.component.php'; ?>

    <div class="contenedor">
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo $post['titulo']?></h2>
                <p class="fecha"><?php echo dates_format($post['fecha'])?></p>
                <div class="thumb">
                    <img src="./imgs/<?php echo $post['thumb']?>" alt="<?php echo $post['titulo']?>">
                </div>
                <p class="extracto"><?php echo nl2br($post['texto']) ?></p>
            </article>
        </div>
    </div>
</body>
</html>