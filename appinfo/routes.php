<?php
// backend/route.php

require_once 'FileController.php';

// Define routes
$route = $_GET['action'] ?? '';

switch ($route) {
    case 'upload':
        FileController::upload();
        break;
    case 'delete':
        FileController::delete();
        break;
    case 'search':
        FileController::search();
        break;
    case 'view':
        FileController::view();
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
}
?>
