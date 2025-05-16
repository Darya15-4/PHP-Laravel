<?php
include 'db.php';
include 'menu.php';

$action = $_GET['action'] ?? 'view';
$sort = $_GET['sort'] ?? 'added';
$page = $_GET['page'] ?? 1;

echo getMenu($action, $sort);

switch ($action) {
    case 'add':
        include 'add.php';
        showAddForm();
        break;
    case 'edit':
        include 'edit.php';
        showEditForm();
        break;
    case 'delete':
        include 'delete.php';
        showDeletePage();
        break;
    case 'view':
    default:
        include 'viewer.php';
        showContacts($sort, $page);
        break;
}
