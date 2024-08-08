<?php
require_once "/var/www/html/connection.php";
$assemblyId = $_GET['assembly'];
$sql_new = "SELECT *
            FROM assemblycomponents
            LEFT JOIN assemblies ON assemblies.AssemblyID = assemblycomponents.ChildAssemblyID
            LEFT JOIN parts ON parts.PartID = assemblycomponents.ChildPartID
            WHERE ParentAssemblyID = ?;";
$stmt = $conn->prepare($sql_new);
$stmt->bind_param("i", $assemblyId);
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
// close at end of file after all queries are done
$conn->close();
?>




<?php require_once "/var/www/html/htmlHead.php";?>
<div class="min-h-screen bg-gray-100 py-20 px-4">
    <!-- Adjusted padding to accommodate fixed headers/footers -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Parts List</h2>
        <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
            <thead class="bg-gray-800 text-white">
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Quantity</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                <tr>
                    <td class="py-2 px-4 border-b text-center"><?php echo $row['AssemblyComponentID']; ?></td>
                    <td class="py-2 px-4 border-b text-center"><?php echo is_null($row['ChildPartID']) ? '<i class="iconoir-report-columns text-green-600 "></i>' : '<i class="iconoir-cube text-blue-600 "></i>'; ?></td>
                    <td class="py-2 px-4 border-b text-center"><?php echo is_null($row['ChildPartID']) ? $row['AssemblyName'] : $row['PartName']; ?></td>
                    <td class="py-2 px-4 border-b text-center"><?php echo $row['Quantity']; ?></td>
                    <td class="py-2 px-4 border-b text-center">
                        <button onclick="confirmDelete(<?php echo htmlspecialchars($row['AssemblyComponentID']); ?>)" class="text-red-600 hover:text-red-800">
                            <i class="iconoir-trash-solid"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<script>
function confirmDelete(partId) {
    if (confirm('Are you sure you want to remove this from the assembly? It will be removed from the assembly but will not be deleted from the system.')) {
        window.location.href = 'removeFromAssembly.php?id=' + partId;
    }
}
</script>





<?php require_once "/var/www/html/htmlFoot.php";?>