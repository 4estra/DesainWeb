<?php
include 'koneksi.php';
$id = $_GET['id'];

if (isset($_POST['upload'])) {
    $target_dir = __DIR__ . '/uploads/';
    if (!is_dir($target_dir))
        mkdir($target_dir, 0777, true);

    $nama_file = $_FILES['bukti']['name'];
    $target_file = $target_dir . basename($nama_file);

    if (move_uploaded_file($_FILES['bukti']['tmp_name'], $target_file)) {
        mysqli_query($conn, "UPDATE pesanan SET bukti_bayar = '$nama_file' WHERE id = '$id'");
        header("Location: confirmation.php?id=$id");
        exit();
    } else {
        $error = "Upload gagal, cek file kamu!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload Bukti</title>
</head>

<body style="background: #000; color: #fff; font-family: sans-serif; margin: 0; padding: 0;">

    <div
        style="max-width: 400px; margin: 100px auto; padding: 30px; background: #111; border: 1px solid #333; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.5);">

        <h2 style="text-align: center; margin-bottom: 25px; font-weight: 300;">Upload Bukti Transfer</h2>

        <?php if (isset($error))
            echo "<p style='color: #ff4444; text-align: center; font-size: 0.9rem;'>$error</p>"; ?>

        <form method="POST" enctype="multipart/form-data">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: #aaa; font-size: 0.85rem;">Pilih foto bukti
                    pembayaran:</label>
                <input type="file" name="bukti" required
                    style="width: 100%; padding: 10px; background: #222; border: 1px solid #444; color: #fff; border-radius: 5px; box-sizing: border-box;">
            </div>

            <button type="submit" name="upload"
                style="width: 100%; padding: 12px; background: #fff; color: #000; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; transition: 0.3s;">
                Kirim Bukti
            </button>
        </form>

    </div>

</body>

</html>