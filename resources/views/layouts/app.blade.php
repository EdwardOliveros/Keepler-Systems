<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    
    <style>
        * {
            box-sizing: border-box;
            margin: 0 auto;
            padding: 0;
            font-size: 20px;
        }
        

        body {
            background-color: white;
            color: black;
            margin: 0;
            display: flex;
        }

        header{
            background-color: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            height: 85px;
            padding: 5px 10%;
        }

        .header .logo {
            cursor: pointer;
        }

        .header .logo img {
            height: 70px;
            width: auto;
            transition: all 0.3s ease;
        }

        header .logo img:hover{
            transform: scale(1.2);
        }

        .header .logout button{
            font-weight: 700;
            color: white;
            padding: 9px 25px;
            background: blue;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.2s ease 0s;
        }

        .header .logout button:hover{
            background-color: white;
            color: black;
            transform: scale(1.1);

        }

        .btn-primary {
            background-color: white;
            color: green;
        }

        .btn-primary:hover {
            background-color: green;
            color: white;
        }

        .table {
            background-color: black;
            color: white;
        }

 
        .navigation-bar {
            background-color: #333;
        }

        .control-nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .control-nav ul li {
            display: inline-block;
        }

        .control-nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .control-nav ul li a:hover {
            background-color: #555;
        }
    </style>


    <title>Keepler-Systems</title>
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5257ead9f1.js" crossorigin="anonymous"></script>
</body>
</html>
