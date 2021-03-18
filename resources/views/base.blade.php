<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vegan Activist</title>

    <link href="/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
">

</head>
<body>

<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <div class="left-content d-flex align-items-center">
                        <div class="logo">
                            <a href="/"><img src="/logo.jpg" alt="Vegan Hacktivist"></a>
                        </div>

                        <form action="#" class="form-box">
                            <input type="text" name="Search" placeholder="Search questions/answers..">
                            <div class="search-icon">
                                <i class="fa fa-search"></i>
                            </div>
                        </form>
                    </div>

                    <div class="main-menu">
                        <nav>
                            <ul id="navigation">
                                <li><a href="/">Home</a></li>
                                <li><a href="/">Popular Questions</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@yield("content")

</body>
</html>
