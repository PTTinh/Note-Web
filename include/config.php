<?php

/*
 * Thay "php_common_function" bằng tên thư mục của bạn ở htdocs
 */

// Thư mục gốc ở htdocs (đối với XAMPP)
define('ROOT_PATH', "/Note");

// Thư mục chứa file asset (css/js/img)
define('ASSET_PATH', "/Note/asset");

// Thư mục chứa file upload bởi user
define('UPLOAD_PATH', "/Note/upload");

// Đường dẫn đầy đủ đến thư mục hiện tại, không cần chỉnh sửa nếu dùng XAMPP
define('DOCUMENT_ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);

// Thông tin đăng nhập database
$database = [
	"host" => "localhost",
	"db" => "personal_task_management",
	"username" => "root",
	"password" => "",
];
session_start();