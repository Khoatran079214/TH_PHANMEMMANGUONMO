<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['MaSV'], $_POST['HoTen'], $_POST['GioiTinh'],
        $_POST['NgaySinh'], $_POST['Hinh'], $_POST['MaNganh']
    ]);
    header('Location: index.php');
    exit;
}

$nganhs = $pdo->query("SELECT * FROM NganhHoc")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ecf0f1;
            padding: 40px;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        form {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h2>Thêm sinh viên</h2>
<form method="post">
    <label>Mã SV:</label>
    <input name="MaSV" type="text" required>

    <label>Họ tên:</label>
    <input name="HoTen" type="text" required>

    <label>Giới tính:</label>
    <select name="GioiTinh">
        <option>Nam</option>
        <option>Nữ</option>
    </select>

    <label>Ngày sinh:</label>
    <input name="NgaySinh" type="date" required>

    <label>Hình ảnh URL:</label>
    <input name="Hinh" type="text">

    <label>Ngành học:</label>
    <select name="MaNganh">
        <?php foreach ($nganhs as $ng): ?>
            <option value="<?= $ng['MaNganh'] ?>"><?= $ng['TenNganh'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">💾 Lưu thông tin</button>
</form>

</body>
</html>
