<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Library</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body, html{
            height:100%;
            font-family: Arial, sans-serif;
        }

        .hero-image{
            background-image:
            linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
            url('https://images.unsplash.com/photo-1507842217343-583bb7270b66');

            height:100%;
            background-position:center;
            background-repeat:no-repeat;
            background-size:cover;

            display:flex;
            justify-content:center;
            align-items:center;

            color:white;
            text-align:center;
            position:relative;
        }

        .navbar{
            position:absolute;
            top:0;
            width:100%;
            padding:20px;
            display:flex;
            justify-content:space-between;
            background:rgba(0,0,0,0.3);
        }

        .navbar a{
            color:white;
            text-decoration:none;
            margin-left:20px;
        }

        .hero-text h1{
            font-size:55px;
            margin-bottom:15px;
        }

        .hero-text p{
            font-size:22px;
            margin-bottom:30px;
        }

        .btn-login{
            padding:15px 35px;
            background:#3498db;
            color:white;
            text-decoration:none;
            border-radius:30px;
            font-size:18px;
        }

        .btn-login:hover{
            background:#2980b9;
        }
    </style>
</head>

<body>

<div class="hero-image">

    <div class="navbar">
        <h2>📚 Library</h2>

        <div>
            <a href="login.php">Login</a>
            <a href="#">About Us</a>
        </div>
    </div>

    <div class="hero-text">
        <h1>Welcome To Our Library</h1>

        <p>"Libraries: The medicine chest of the soul."</p>

        <a href="login.php" class="btn-login">
            Get Started →
        </a>
    </div>

</div>

</body>
</html>