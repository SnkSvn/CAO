<?php
    session_start();
    
    if($_SESSION['acceso'] == false){
        header('Location:../');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAO</title>
    <?php require('layout/lib-head.php')?>

</head>
<body>

    <?php require('layout/navbar.php') ?>

    <!-- Secciones inicio -->
    <section class="inicio">
    <div class="primer_section">
        <div class="texto-principal">
            <h3 class="titulo-principal">CURSOS ACADEMICOS ONLINE</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque 
            praesentium fugit labore itaque sint commodi autem ipsum expedita qui deserunt.</p>
        </div>

    </div>
    <div class="stylo-curva" style="height: 150px; overflow: hidden;" >
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #1A5276;">
            </path>
        </svg>
    </div>
    </section>


    <section class="cursos-destacados">
        <div class="vista-curso">
            <div class="titulo-curso">
                <h3>CURSOS DESTACADOS</h3>
            </div>
            <div class="contenedor-cursos">
                <div class="card-cursos">
                    <img src="img/curso1.jpg" alt="">
                    <h4>Curso PHP</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae eligendi aliquam sint, molestiae ipsam placeat.</p>
                </div>
                <div class="card-cursos">
                    <img src="img/curso2.jpg" alt="">
                    <h4>Curso Avanzado Angular</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde ad laborum qui! Iusto, magnam vero!</p>
                </div>
                <div class="card-cursos">
                    <img src="img/curso3.jpg" alt="">
                    <h4>Curso Intermedio Photoshop</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam rerum, est officiis a quia eius.</p>
                </div>
                <div class="card-cursos">
                    <img src="img/curso3.jpg" alt="">
                    <h4>Curso PHP</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam rerum, est officiis a quia eius.</p>
                </div>
            </div>
        </div>

    </section>

    <section class="section-blog">
        <h3 id="about">Sobre Nosotros</h3>
        <div class="container-blog">
            <img src="img/img-blog.png" alt="">
            <div class="txt-blog">
                <h3><span>1</span>Los mejores productos</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, ab, cupiditate sapiente consectetur voluptatem eius pariatur 
                laboriosam magnam a! Corrupti tenetur, quis accusamus libero amet recusandae delectus nam doloribus rerum!</p>
                <h3><span>2</span>Los mejores productos</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, ab, cupiditate sapiente consectetur voluptatem eius pariatur 
                laboriosam magnam a! Corrupti tenetur, quis accusamus libero amet recusandae delectus nam doloribus rerum!</p>
                <h3><span>3</span>Los mejores productos</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, ab, cupiditate sapiente consectetur voluptatem eius pariatur 
                laboriosam magnam a! Corrupti tenetur, quis accusamus libero amet recusandae delectus nam doloribus rerum!</p>
                <img src="img/img-blog2.png" alt="">
            </div>        
        </div>
    </section>
    <!-- Secciones inicio -->



    <?php require('layout/footer.php') ?>
    
    <?php require('layout/lib-script.php')?>

</body>
</html>