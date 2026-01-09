<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Particle')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .admin-header nav {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .admin-header h1 {
            font-size: 1.5rem;
        }
        .admin-nav {
            display: flex;
            gap: 1.5rem;
        }
        .admin-nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }
        .admin-nav a:hover {
            opacity: 0.8;
        }
        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        @media (max-width: 768px) {
            .admin-nav {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="admin-header">
        <nav>
            <h1>🔧 Admin Panel - Particle</h1>
            <div class="admin-nav">
                <a href="/admin">Dashboard</a>
                <a href="/admin/users">Users</a>
                <a href="/admin/faq">FAQ</a>
                <a href="/admin/modifyHero">Hero</a>
                <a href="/">View Site</a>
            </div>
        </nav>
    </div>

    <div class="admin-container">
        @yield('content')
    </div>
</body>
</html>
