<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-semibold text-lg">{{ $navbarTitle ?? 'Apart' }}</div>
            <!-- Add your navbar items or user information here -->
        </div>
    </nav>

    <!-- Sidebar and Content -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="bg-blue-400 text-white w-64 min-h-screen">
            <div class="">
                <h1 class="text-2xl font-semibold mb-4">{{ $sidebarTitle ?? 'Admin Dashboard' }}</h1>
                <ul>
                    <!-- Add your sidebar links here -->
                    <li class="mb-2">
                        <a href="{{ route('admin.dashboard.statistics') }}" class="block px-4 py-2 text-white hover:bg-blue-600 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">
                            Dashboard
                        </a>
                    </li>                    <li class="mb-2"><a href="{{route('admin.roles.index')}}" class="block px-4 py-2 text-white hover:bg-blue-600 {{ request()->routeIs('admin.roles.*') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">Roles</a></li>
                    <li class="mb-2"><a href="{{route('admin.users.index')}}" class="block px-4 py-2 text-white hover:bg-blue-600 {{ request()->routeIs('admin.users.*') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">Users</a></li>
                    <li class="mb-2"><a href="{{route('admin.properties.index')}}" class="block px-4 py-2 text-white hover:bg-blue-600 {{ request()->routeIs('admin.properties.*') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">Properties</a></li>
                    <li class="mb-2"><a href="{{route('admin.property_types.index')}}" class="block px-4 py-2 text-white hover:bg-blue-600 {{ request()->routeIs('admin.property_types.*') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">PropertyTypes</a></li>
                    <li class="mb-2"><a href="{{route('admin.locations.index')}}" class="block px-4 py-2 text-white hover:bg-blue-600 {{ request()->routeIs('admin.locations.*') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">Locations</a></li>
                    <li class="mb-2"><a href="{{route('admin.bookings.index')}}" class="block px-4 py-2 text-white hover:bg-blue-600 {{ request()->routeIs('admin.bookings.*') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">Bookings</a></li>
                    <li class="mb-2"><a href="{{route('admin.reviews.index')}}" class="block px-4 py-2 text-white hover:bg-blue-600 {{ request()->routeIs('admin.reviews.*') ? 'bg-blue-500' : 'hover:bg-blue-600' }}">Reviews</a></li>
                    <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    >Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form></li>
                    <!-- Add more links as needed -->
                </ul>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
