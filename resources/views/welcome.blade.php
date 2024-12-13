<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de TI</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Pixelify Sans', sans-serif;
            background-image: url('https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExdmJhYmZlYnRyNTlqdGFrbTQyMHBkZ3ViOWRoZnlpdHZ0cWY4NTQ0cCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/26tn33aiTi1jkl6H6/giphy.gif');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            color: rgb(255, 255, 255);
            text-align: center;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 600px;
        }

        .header {
            margin: 0 auto 20px;
            padding: 20px;
            background: rgba(52, 50, 50, 0.8);
            border-radius: 10px;
        }

        .header h1 {
            font-size: 3rem;
            margin: 0;
        }

        .header p {
            font-size: 1.5rem;
            margin: 10px 0 0;
        }

        .links {
            margin: 20px auto 0;
            padding: 15px;
            background: rgba(52, 50, 50, 0.8);
            border-radius: 10px;
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
    <div class="container">
        <div class="header">
            <h1>O Que você sabe?</h1>
            <p>Teste seus conhecimentos sobre Tecnologia da Informação 🚀</p>
        </div>

        <div class="links">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}">Ir para o Quiz</a>
                    @else
                        <a href="{{ route('login') }}">Login</a> |
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
