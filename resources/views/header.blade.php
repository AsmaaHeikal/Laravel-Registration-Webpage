<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FCAI CU</title>
    <style>
        header {
            background-color: #31363F;
            color: #ffffff;
            padding: 5px 20px;
            width: 100%;
            height: 70px;
        }

        header h1{
            margin-left: 20px;
        }
        header nav {
            margin-left: 600px;
        }
        header h1, header nav {
            display: inline-block; /* Set both h1 and nav to inline-block */
            vertical-align: middle; /* Align them vertically */
        }
        header nav a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 30px;
            font-size: large;
            /* Add some space between the links */
        }
    </style>
</head>

<body>
    <header>
        <h1>FCAI CU</h1>
        <nav>
            <a href="index.php">@lang('mycustom.Home')</a>
            <a href="index.php">@lang('mycustom.Login')</a>
            <a href="index.php">@lang('mycustom.About')</a>
            <a href="{{route("locale",'ar')}}">AR</a>
            <a href="{{route("locale",'en')}}">EN</a>
        </nav>
    </header>