<?php
// --- Konfigurasi koneksi database ---
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'donasi_app';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// --- Simulasi login user ---
session_start();
$user_id = 1; // Ganti sesuai sesi login sebenarnya

// --- Proses jika form disubmit ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $target_dana = $_POST['target_dana'];
    $batas_waktu = $_POST['batas_waktu'];

    // Proses upload gambar
    $gambar_path = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar_name = time() . '_' . basename($_FILES['gambar']['name']);
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_dir . $gambar_name);
        $gambar_path = $upload_dir . $gambar_name;
    }

    // Simpan ke database
    $sql = "INSERT INTO galang_dana (user_id, judul, deskripsi, target_dana, batas_waktu, gambar)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdss", $user_id, $judul, $deskripsi, $target_dana, $batas_waktu, $gambar_path);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>✅ Kampanye berhasil dibuat.</p>";
    } else {
        echo "<p style='color:red;'>❌ Gagal menyimpan: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buat Kampanye Galang Dana</title>
</head>
<body>
    <h2>Buat Kampanye Galang Dana</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Judul Kampanye:</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" rows="5" required></textarea><br><br>

        <label>Target Dana (Rp):</label><br>
        <input type="number" name="target_dana" required><br><br>

        <label>Batas Waktu:</label><br>
        <input type="date" name="batas_waktu" required><br><br>

        <label>Gambar Kampanye:</label><br>
        <input type="file" name="gambar" accept="image/*"><br><br>

        <input type="submit" value="Buat Kampanye">
    </form>
</body>
</html>
