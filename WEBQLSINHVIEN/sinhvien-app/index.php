<?php
include 'db.php';

$limit = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Lấy danh sách sinh viên kèm tên ngành
$sql = "SELECT sv.*, nh.TenNganh FROM SinhVien sv 
        JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh 
        LIMIT $start, $limit";
$students = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// Đếm tổng số sinh viên
$total = $pdo->query("SELECT COUNT(*) FROM SinhVien")->fetchColumn();
$total_pages = ceil($total / $limit);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f8f8f8;
        }
        h2 {
            color: #2c3e50;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #2980b9;
            margin: 0 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        img {
            border-radius: 4px;
        }
        .pagination {
            margin-top: 15px;
            text-align: center;
        }
        .pagination a {
            padding: 8px 12px;
            border: 1px solid #3498db;
            border-radius: 3px;
            margin: 0 2px;
            color: #3498db;
            background-color: white;
            transition: 0.3s;
        }
        .pagination a:hover {
            background-color: #3498db;
            color: white;
        }
        .add-button {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Danh sách sinh viên</h2>
<div class="add-button">
    <a href="create.php">➕ Thêm sinh viên</a>
</div>

<table>
    <tr>
        <th>Mã SV</th><th>Họ tên</th><th>Giới tính</th>
        <th>Ngày sinh</th><th>Ngành</th><th>Ảnh</th><th>Thao tác</th>
    </tr>
    <?php foreach ($students as $sv): ?>
    <tr>
        <td><?= $sv['MaSV'] ?></td>
        <td><?= $sv['HoTen'] ?></td>
        <td><?= $sv['GioiTinh'] ?></td>
        <td><?= $sv['NgaySinh'] ?></td>
        <td><?= $sv['TenNganh'] ?></td>
        <td><img src="<?= $sv['Hinh'] ?>" width="80"></td>
        <td>
            <a href="detail.php?id=<?= $sv['MaSV'] ?>">👁</a>
            <a href="edit.php?id=<?= $sv['MaSV'] ?>">✏️</a>
            <a href="delete.php?id=<?= $sv['MaSV'] ?>" onclick="return confirm('Xóa?')">🗑</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>

</body>
</html>
