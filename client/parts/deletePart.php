<?php
require_once "/var/www/html/connection.php";
$deleteID = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM parts WHERE PartId = ?");
$stmt->bind_param("i", $deleteID);
$stmt->execute();
echo '<div class="min-h-screen bg-gray-100 py-20 px-4">';
echo "Record deleted successfully";
echo '</div>';
$stmt->close();
// close at end of file after all queries are done
$conn->close();
?>

