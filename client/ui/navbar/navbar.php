
<!-- Dark Background -->
<div onclick="toggleLeftMenuPosition()" id="darkenBackground" class="opacity-0 pointer-events-none duration-700 transition-opacity backdrop-blur-sm bg-white/30 bg-slate-800 w-screen h-screen fixed top-0 left-0 right-0">
</div>
<!-- Left Side Menu -->
<nav id="rightMenu" class="translate-x-full transition-all duration-500 bg-slate-100 h-screen w-screen max-w-xl pt-3 pr-8 fixed top-0 right-0 shadow-lg flex flex-col flex-grow justify-start ">
    <a href="/parts" class="text-white flex items-center mx-3 mb-3 bg-gray-700 bg-opacity-50 hover:bg-opacity-100 px-3 py-2 rounded-md">
        <i class="iconoir-cube"></i>
        <span class="hidden md:inline">Parts</span>
    </a>
    <a href="/assemblies" class="text-white flex items-center  mx-3 mb-3 bg-gray-700 bg-opacity-50 hover:bg-opacity-100 px-3 py-2 rounded-md">
        <i class="iconoir-orthogonal-view"></i>
        <span class="hidden md:inline">Assemblies</span>
    </a>
</nav>
<script>
    var rightMenuStatus = "in";

    function moveLeftMenuOut(){
        var rightMenu = document.getElementById('rightMenu');
        rightMenu.classList.remove("translate-x-full");
        rightMenu.classList.add("translate-x-8");  
    }
    function moveLeftMenuIn(){
        var rightMenu = document.getElementById('rightMenu');
        rightMenu.classList.add("translate-x-full");
        rightMenu.classList.remove("translate-x-8");

    }
    function hideBackground(){
        var background = document.getElementById('darkenBackground');
        background.classList.add("opacity-0");
        background.classList.remove("opacity-100");
        background.classList.add('pointer-events-none');
    }
    function showBackground(){
        var background = document.getElementById('darkenBackground');
        background.classList.add("opacity-100");
        background.classList.remove("opacity-0");
        background.classList.remove('pointer-events-none');

        
    }

    function toggleLeftMenuPosition(){
        if(rightMenuStatus == "out"){
            moveLeftMenuIn();
            hideBackground();
            rightMenuStatus = "in";
        } else {
            moveLeftMenuOut();
            showBackground();
            rightMenuStatus = "out";
        }
    }
</script>