<?php
$file = 'status.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_status = $_POST['status'];
    file_put_contents($file, $new_status);
    echo json_encode(['success' => true]);
    exit;
}

if (file_exists($file)) {
    $current_status = file_get_contents($file);
} else {
    $current_status = 'inside';
}

echo json_encode(['status' => $current_status]);
?>