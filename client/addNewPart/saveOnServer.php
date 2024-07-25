<?php
require_once "/var/www/html/connection.php";

$partName = $_POST['partNumber'];

// Check for duplicate entry
$checkStmt = $conn->prepare("SELECT COUNT(*) FROM parts WHERE PartName = ?");
$checkStmt->bind_param("s", $partName);
$checkStmt->execute();
$checkStmt->bind_result($count);
$checkStmt->fetch();
$checkStmt->close();

if ($count > 0) {
    // Duplicate found, show error message
    echo "<p style='color:red;' >Error: A part with the name '$partName' already exists. Please choose a different name." . '</p>';
} else {
    // No duplicate, proceed with insert
    $stmt = $conn->prepare("INSERT INTO parts (PartName) VALUES (?)");
    $stmt->bind_param("s", $partName);
    $stmt->execute();
    $newly_inserted_id = $conn->insert_id;
    require_once "/var/www/html/htmlHead.php";
    echo "<br><br><br><br>";
    echo "<p style='color:green;' >New record created successfully with ID: " . $newly_inserted_id . '</p>';
    require_once "/var/www/html/htmlFoot.php";
    $stmt->close();
}

$conn->close();
?>
