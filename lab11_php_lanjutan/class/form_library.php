<?php
include("config.php");
include("form_library.php");

$formLib = new FormLibrary($conn);
$result = $formLib->fetchData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (head section) ... -->
</head>

<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <a href="tambah.php">Tambah Barang</a>
            <?php echo $formLib->generateTable($result); ?>
        </div>
    </div>
</body>

</html>
