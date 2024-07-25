<?php
require_once "/var/www/html/connection.php";
$sql_new = "SELECT * FROM assemblies";
$stmt = $conn->prepare($sql_new);
$stmt->execute();
$assemblyList = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// close at end of file after all queries are done
$conn->close();
?>
<?php require_once "/var/www/html/htmlHead.php";?>
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <form action="saveOnServer.php" method="post" class="space-y-6">
            <div>
                <label for="parentAssemblyId" class="block text-sm font-medium text-gray-700">Parent Assembly Name</label>
                <select id="parentAssemblyId" name="parentAssemblyId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <?php
                        foreach($assemblyList as $assembly){
                            echo '<option value="' . $assembly['AssemblyID'] .'">';
                            echo $assembly['AssemblyName'];
                            echo '</option>';
                        }
                    ?>
                </select>
            </div>

            <div>
                <label for="childAssemblyId" class="block text-sm font-medium text-gray-700">Child Assembly Name</label>
                <select id="childAssemblyId" name="childAssemblyId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <?php
                        foreach($assemblyList as $assembly){
                            echo '<option value="' . $assembly['AssemblyID'] .'">';
                            echo $assembly['AssemblyName'];
                            echo '</option>';
                        }
                    ?>
                </select>
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Child Quantity</label>
                <input name="quantity" id="quantity" type="number" value="1" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Assembly To Assembly
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once "/var/www/html/htmlFoot.php";?>
