<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: dilesh chouhan <dileshchouhan86@gmail.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\ManagementFile\Controller;

use OCA\ManagementFile\AppInfo\Application;
use OCA\ManagementFile\Service\NoteService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class FileController extends Controller {
	private static $uploadDir = 'uploads/';

    public static function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $targetFile = self::$uploadDir . basename($_FILES['file']['name']);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                echo json_encode(['message' => 'File uploaded successfully']);
            } else {
                echo json_encode(['error' => 'Failed to upload file']);
            }
        } else {
            echo json_encode(['error' => 'Invalid request']);
        }
    }

    public static function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filename'])) {
            $filename = $_POST['filename'];
            $filePath = self::$uploadDir . $filename;

            if (file_exists($filePath)) {
                unlink($filePath);
                echo json_encode(['message' => 'File deleted successfully']);
            } else {
                echo json_encode(['error' => 'File not found']);
            }
        } else {
            echo json_encode(['error' => 'Invalid request']);
        }
    }

    public static function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $files = scandir(self::$uploadDir);

            $matchingFiles = array_filter($files, function ($file) use ($searchTerm) {
                return strpos($file, $searchTerm) !== false;
            });

            echo json_encode(['files' => $matchingFiles]);
        } else {
            echo json_encode(['error' => 'Invalid request']);
        }
    }

    public static function view() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filename'])) {
            $filename = $_GET['filename'];
            $filePath = self::$uploadDir . $filename;

            if (file_exists($filePath)) {
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: inline; filename=' . $filename);
                readfile($filePath);
            } else {
                echo json_encode(['error' => 'File not found']);
            }
        } else {
            echo json_encode(['error' => 'Invalid request']);
        }
    }
}
