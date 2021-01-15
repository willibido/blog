<?php require 'header.component.php'; ?>

    <div class="contenedor">
        <?php foreach($posts as $post): ?>
            <div class="post">
                <article>
                    <h2 class="titulo"><a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['titulo'] ?></a></h2>
                    <p class="fecha"><?php echo dates_format($post['fecha']) ?></p>
                    <div class="thumb">
                        <a href="single.php?id=<?php echo $post['id'] ?>">
                            <img src="./imgs/<?php echo $post['thumb'] ?>" alt="<?php echo $post['titulo'] ?>">
                        </a>
                    </div>
                    <p class="extracto"><?php echo $post['extracto'] ?></p>
                    <a href="single.php?id=<?php echo $post['id'] ?>">Continuar Leyendo</a>
                </article>
            </div>
        <?php endforeach; ?>

    </div>
    
    <?php require 'paginacion.php'; ?>
</body>
</html>