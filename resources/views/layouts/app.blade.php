<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Particle | Raven Belgium')</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            margin-left: 50px;
            margin-right: 50px;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 20px;
            padding-right: 20px;
        }
        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            margin-right: 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        #right-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        #right-section p {
            margin: 0;
        }
        #mainContents {
            margin-left: 20px;
            margin-right: 20px;
        }
        @media screen and (max-width: 800px) {
            body {
                margin-left: 10px;
                margin-right: 10px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/countries">Plans</a></li>
        </ul>

        <a id="loginButton" href="/login">
            <div id="right-section">
                <p>iMad</p>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 610.5 449.75" width="30" height="30">
                    <g>
                        <rect height="449.75" opacity="0" width="610.5" x="0" y="0"/>
                        <path d="M42.75 449.5L378 449.5C404.75 449.5 420.75 437 420.75 416.25C420.75 351.75 340 262.75 210.25 262.75C80.75 262.75 0 351.75 0 416.25C0 437 16 449.5 42.75 449.5ZM210.5 218C264 218 310.5 170 310.5 107.5C310.5 45.75 264 0 210.5 0C157 0 110.5 46.75 110.5 108C110.5 170 156.75 218 210.5 218Z" fill="currentColor" fill-opacity="0.85"/>
                        <path d="M419.5 214.25C425.25 214.25 430.25 212 434 208L604.5 37.25C608.75 33 610.5 28.75 610.5 23.25C610.5 12.25 601.75 3.25 590.5 3.25C585.25 3.25 581 5.25 576.75 9.5L405.5 180C401.75 183.75 399.5 188.5 399.5 194C399.5 205 408.5 214.25 419.5 214.25ZM590.5 214.25C601.75 214.25 610.5 205 610.5 194C610.5 188.5 608.5 183.75 604.5 180L433.5 9.5C429.25 5.25 424.75 3.25 419.5 3.25C408.5 3.25 399.5 12.25 399.5 23.25C399.5 28.75 401.5 33 405.5 37.25L576.25 208C580 212 585 214.25 590.5 214.25Z" fill="currentColor" fill-opacity="0.85"/>
                    </g>
                </svg>
            </div>
        </a>
    </nav>

    <div id="mainContents">
        @yield('content')
    </div>
</body>
</html>
