
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuildYour Boutique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-pink-800 text-white">
                <div class="flex items-center justify-center h-16 px-4 bg-pink-900">
                    <span class="text-xl font-bold">BoutiquePanel</span>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <div class="space-y-1">
                        <a href="/" class="flex items-center px-2 py-3 text-base font-medium rounded-md bg-pink-900 text-white">
                            <i class="fas fa-store mr-3 text-yellow-400"></i>
                            <span class="text-black font-bold">Build</span>
                            <span class="text-yellow-400 font-semibold">YourBoutique</span>
                        </a>

                        <a href="/dashboard" class="flex items-center px-2 py-3 text-sm font-medium rounded-md hover:bg-pink-700">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a href="/profile" class="flex items-center px-2 py-3 text-sm font-medium rounded-md hover:bg-pink-700">
                            <i class="fas fa-user mr-3"></i>
                            My Profile
                        </a>
                        <a href="/data" class="flex items-center px-2 py-3 text-sm font-medium rounded-md hover:bg-pink-700">
                            <i class="fas fa-box mr-3"></i>
                            Store Data
                        </a>
                        <a href="/add" class="flex items-center px-2 py-3 text-sm font-medium rounded-md hover:bg-pink-700">
                            <i class="fas fa-plus mr-3"></i>
                            Add Products
                        </a>
                        <a href="/template" class="flex items-center px-2 py-3 text-sm font-medium rounded-md hover:bg-pink-700">
                            <i class="fas fa-book mr-3"></i>
                            Templates
                        </a>
                        <!-- <a href="#" class="flex items-center px-2 py-3 text-sm font-medium rounded-md hover:bg-pink-700">
                            <i class="fas fa-shopping-cart mr-3"></i>
                            Products
                        </a>
                        <a href="#" class="flex items-center px-2 py-3 text-sm font-medium rounded-md hover:bg-pink-700">
                            <i class="fas fa-chart-bar mr-3"></i>
                            Analytics
                        </a>
                        <a href="#" class="flex items-center px-2 py-3 text-sm font-medium rounded-md hover:bg-pink-700">
                            <i class="fas fa-cog mr-3"></i>
                            Settings
                        </a> -->
                    </div>
                </div>
                <div class="p-2 border-t border-pink-700">
                    <div class="flex items-center">
                        <img class="w-10 h-9 rounded-full" src="https://static.vecteezy.com/system/resources/previews/019/879/186/non_2x/user-icon-on-transparent-background-free-png.png" alt="User profile">
                        <div class="ml-3">
                            <!-- <p class="text-sm font-medium">Sarah Johnson</p> -->
                            <form method="POST" action="/logout" class="ml-2">
                                @csrf
                                <button class="transition text-xl flex items-center space-x-1" title="Logout"><i class="fas fa-sign-out-alt"></i><span>Logout</span>
                                </button>
                            </form>

                            <!-- <p class="text-xs text-pink-200">User</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <!-- Main Content Area with Footer -->
<div class="flex flex-col flex-1 overflow-hidden">
    <!-- Top Navigation -->
    <header class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200">
        <div class="flex items-center">
            <button id="mobile-menu-button" class="md:hidden text-gray-500 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
            <div class="relative mx-4">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" class="w-full py-2 pl-10 pr-4 text-sm bg-gray-100 rounded-lg focus:outline-none" placeholder="Search boutique items...">
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <button id="notification-btn" class="text-gray-500 focus:outline-none relative">
                <i class="fas fa-bell"></i>
                <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
            </button>
            <div id="profile-dropdown" class="relative">
                <button id="profile-btn" class="flex items-center space-x-2 focus:outline-none" onclick="window.location.href='/profile'">
                    <img class="w-8 h-8 rounded-full" src="https://static.vecteezy.com/system/resources/previews/019/879/186/non_2x/user-icon-on-transparent-background-free-png.png" alt="User profile">
                </button>

                <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>
            </div>
        </div>
    </header>