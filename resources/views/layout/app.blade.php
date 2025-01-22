<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f7fc;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding-top: 30px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            font-size: 1.8em;
            color: #fff;
            margin-bottom: 40px;
            text-align: center;
        }

        .sidebar a {
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            font-size: 1.1em;
            transition: background-color 0.3s, padding-left 0.3s;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #495057;
            padding-left: 30px;
        }

        .sidebar a.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding-left: 30px;
        }

        /* Content Section */
        .content {
            margin-left: 250px;
            padding: 40px;
        }

        .navbar {
            margin-left: 250px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand {
            font-size: 1.5em;
            color: #007bff;
        }

        .navbar .navbar-nav {
            margin-left: auto;
        }

        .logout-btn {
            font-size: 1.1em;
            color: #fff;
            background-color: #dc3545;
            border-radius: 5px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .logout-btn:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .logout-btn:focus {
            outline: none;
        }

        .container {
            text-align: center;
            margin-top: 80px;
        }

        h1 {
            font-size: 3.5em;
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
        }

        p {
            font-size: 1.5em;
            color: #555;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
            }
            .content {
                margin-left: 0;
            }
            .navbar {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Admin Panel</h3>
        <a href="{{ route('thanks') }}" class="{{ Request::is('thanks') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('Users') }}" class="{{ Request::is('users') ? 'active' : '' }}">Users</a>
        <a href="#" class="{{ Request::is('settings') ? 'active' : '' }}">Settings</a>
        <a href="*" class="{{ Request::is('reports') ? 'active' : '' }}">Reports</a>
    </div>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand">Admin Panel</span>
            <div class="navbar-nav">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
