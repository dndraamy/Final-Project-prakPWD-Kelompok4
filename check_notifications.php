<?php
include 'koneksi.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['id_user'])) {
    echo json_encode(['unread_count' => 0, 'notifications' => []]);
    exit;
}

$user_id = intval($_SESSION['id_user']); // Pastikan tipe integer untuk keamanan

// cek notif yg belum dibaca
$sql = "SELECT n.*, p.team1, p.team2 
        FROM notifikasi n
        LEFT JOIN pertandingan p ON n.id_pertandingan = p.id
        WHERE n.id_user = $user_id AND n.dibaca = FALSE
        ORDER BY n.created_at DESC";
$result = $koneksi->query($sql);

$notifications = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
}

// tandain sbg sudah dibaca
if (!empty($notifications)) {
    $ids = array_column($notifications, 'id');
    $escaped_ids = array_map('intval', $ids); // Pastikan semua ID aman
    $id_list = implode(',', $escaped_ids);

    $update_sql = "UPDATE notifikasi SET dibaca = TRUE WHERE id IN ($id_list)";
    $koneksi->query($update_sql);
}

echo json_encode([
    'unread_count' => count($notifications),
    'notifications' => $notifications
]);
