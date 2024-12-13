<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de TI</title>

    <!-- Adicionando as links de pré-conexão e importação da fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Pixelify Sans', sans-serif; /* Fonte Pixelify Sans */
            background-image: url('https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExdmJhYmZlYnRyNTlqdGFrbTQyMHBkZ3ViOWRoZnlpdHZ0cWY4NTQ0cCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/26tn33aiTi1jkl6H6/giphy.gif'); /* Caminho da imagem de fundo */
            background-size: cover; /* A imagem vai cobrir todo o fundo */
            background-position: center center; /* Centraliza a imagem */
            background-attachment: fixed; /* A imagem não se move ao rolar */
            color:rgb(255, 255, 255); /* Cor do texto */
            text-align: center;
            font-size: 18px; /* Tamanho base da fonte */
        }
        .header {
            margin-top: 50px;
            background: rgba(52, 50, 50, 0.81)
        }
        .header h1 {
            font-size: 3rem;
        }
        .header p {
            font-size: 1.5rem; 
        }
        .links {
            margin: 30px;
            background: rgba(52, 50, 50, 0.81)
        }
        a {
            color: #F9F4D6; 
            text-decoration: none;
            font-size: 1.2rem; 
        }
        a:hover {
            text-decoration: underline;
            color: #D1C17D;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>O Que você sabe?</h1>
        <p>Teste seus conhecimentos sobre Tecnologia da Informação 🚀</p>
    </div>

    <div class="links">
        <?php if(Route::has('login')): ?>
            <div>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/home')); ?>">Ir para o Quiz</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>">Login</a> |
                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>">Registrar</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\PWI\quiz\resources\views/welcome.blade.php ENDPATH**/ ?>