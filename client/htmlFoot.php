<!-- Footer Navigation -->
<nav class="bg-gray-800 p-4 fixed bottom-0 left-0 right-0">
    <div class="container mx-auto flex justify-center items-center">
        <div class="flex space-x-4">
            <a href="/addNewPart" class="text-white flex items-center space-x-2 bg-gray-700 bg-opacity-50 hover:bg-opacity-100 px-3 py-2 rounded-md">
                <span class="hidden md:inline">Create New Part</span>
                <i class="iconoir-cube"></i>
            </a>
            <a href="/addNewAssembly" class="text-white flex items-center space-x-2 bg-gray-700 bg-opacity-50 hover:bg-opacity-100 px-3 py-2 rounded-md">
                <span class="hidden md:inline">Create New Assembly</span>
                <i class="iconoir-perspective-view"></i>
            </a>
            <a href="/addPartToAssembly" class="text-white flex items-center space-x-2 bg-gray-700 bg-opacity-50 hover:bg-opacity-100 px-3 py-2 rounded-md">
                <span class="hidden md:inline">Add Part To An Assembly</span>
                <i class="iconoir-cube"></i>
                <i class="iconoir-dot-arrow-right"></i>
                <i class="iconoir-perspective-view"></i>
            </a>
            <a href="/addAssemblyToAssembly" class="text-white flex items-center space-x-2 bg-gray-700 bg-opacity-50 hover:bg-opacity-100 px-3 py-2 rounded-md">
                <span class="hidden md:inline">Add An Assembly To An Assembly</span>
                <i class="iconoir-orthogonal-view"></i>
                <i class="iconoir-dot-arrow-right"></i>
                <i class="iconoir-perspective-view"></i>
            </a>
        </div>
    </div>
</nav>
<?php require_once "/var/www/html/ui/navBar/navbar.php";?>
</body>
</html>