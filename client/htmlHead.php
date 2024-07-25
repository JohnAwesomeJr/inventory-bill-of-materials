<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Stuff</title>
    <link rel="stylesheet" href="/styles.css">
    <script src="/htmx.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css"
    />
</head>
<body class="bg-slate-200">
<nav class="bg-gray-800 p-4 fixed top-0 left-0 right-0">
    <div class="container mx-auto flex justify-center items-center">
        <div class="flex space-x-4">
            <div href="/assemblies" onClick="toggleLeftMenuPosition()" class="text-white flex items-center space-x-2 bg-gray-700 bg-opacity-50 hover:bg-opacity-100 px-3 py-2 rounded-md cursor-pointer">
                <span class="cursor-pointer hidden md:inline">Menu</span>
                <i class="cursor-pointer iconoir-menu"></i>    
            </div>
        </div>
    </div>
</nav>

