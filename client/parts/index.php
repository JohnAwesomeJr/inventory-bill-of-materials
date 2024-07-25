<?php
require_once "/var/www/html/connection.php";

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$rowsPerPage = 5;

// Calculate the offset for the query
$offset = ($page - 1) * $rowsPerPage;

// Prepare the query with pagination
$sql_new = "SELECT * FROM mydb.parts LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql_new);
$stmt->bind_param('ii', $rowsPerPage, $offset);
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Get the total number of rows for pagination
$sql_count = "SELECT COUNT(*) AS total FROM mydb.parts";
$stmt_count = $conn->prepare($sql_count);
$stmt_count->execute();
$totalRows = $stmt_count->get_result()->fetch_assoc()['total'];

$stmt->close();
$stmt_count->close();
$conn->close();

$totalPages = ceil($totalRows / $rowsPerPage);
?>

<?php require_once "/var/www/html/htmlHead.php";?>

<div class="min-h-screen bg-gray-100 py-20 px-4"> <!-- Adjusted padding to accommodate fixed headers/footers -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Parts List</h2>
        <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4 border-b">Part ID</th>
                    <th class="py-2 px-4 border-b">Part Name</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $row): ?>
                <tr>
                    <td class="py-2 px-4 border-b text-center"><?php echo htmlspecialchars($row['PartID']); ?></td>
                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['PartName']); ?></td>
                    <td class="py-2 px-4 border-b text-center">
                        <button onclick="confirmDelete(<?php echo htmlspecialchars($row['PartID']); ?>)" class="text-red-600 hover:text-red-800">
                            <i class="iconoir-trash-solid"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Pagination Controls -->
        <div class="mt-4 flex justify-between">
            <a href="?page=<?php echo max(1, $page - 1); ?>" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700">Previous</a>
            <div class="flex items-center">
                <span class="text-gray-700">Page <?php echo $page; ?> of <?php echo $totalPages; ?></span>
            </div>
            <a href="?page=<?php echo min($totalPages, $page + 1); ?>" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700">Next</a>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    function confirmDelete(partId) {
        if (confirm('Are you sure you want to delete this part? when a part is deleted it is also removed from all assemblies.')) {
            window.location.href = 'deletePart.php?id=' + partId;
        }
    }
</script>

<?php require_once "/var/www/html/htmlFoot.php";?>
