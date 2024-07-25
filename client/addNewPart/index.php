<?php require_once "/var/www/html/htmlHead.php";?>
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <form action="saveOnServer.php" method="post" class="space-y-6">
            <div>
                <label for="partNumber" class="block text-sm font-medium text-gray-700">New Part Number</label>
                <input id="partNumber" name="partNumber" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Part
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once "/var/www/html/htmlFoot.php";?>
