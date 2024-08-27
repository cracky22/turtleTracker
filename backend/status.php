<?php
$status_file = 'status.txt';
$name_file = 'name.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['status'])) {
        $new_status = $_POST['status'];
        file_put_contents($status_file, $new_status);
    }

    if (isset($_POST['name'])) {
        $new_name = $_POST['name'];
        file_put_contents($name_file, $new_name);
    }

    echo json_encode(['success' => true]);
    exit;
}

$current_status = file_exists($status_file) ? file_get_contents($status_file) : 'inside';
$current_name = file_exists($name_file) ? file_get_contents($name_file) : 'Unbenannt';

echo json_encode(['status' => $current_status, 'name' => $current_name]);
?>