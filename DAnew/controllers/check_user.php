<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] === 'adminTan') {
    echo json_encode(['isAdmin' => true]);
} else {
    echo json_encode(['isAdmin' => false]);
}
?>
