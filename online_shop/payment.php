<?php
// Hubungkan ke database
include 'koneksi.php';

// Inisialisasi pesan untuk feedback pengguna
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $zipcode = trim($_POST['zipcode']);
    $payment_method = trim($_POST['payment-method']);

    // Validasi input
    if (empty($name) || empty($address) || empty($email) || empty($phone) || empty($zipcode) || empty($payment_method)) {
        $message = "Semua field harus diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Format email tidak valid!";
        $message = "Nomor telepon harus berupa 10-13 digit angka!";
    } else {
        // Buat query untuk menyimpan transaksi menggunakan prepared statement
        $sql = "INSERT INTO payment (name, address, email, phone, zipcode, payment_method) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $address, $email, $phone, $zipcode, $payment_method);

        // Eksekusi query
        if ($stmt->execute()) {
            $message = "Transaksi berhasil disimpan!";
        } else {
            $message = "Gagal menyimpan transaksi: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Perfume Co.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">One Perfume Co.</div>
        <div class="menu">
            <a href="index.php">Home</a>
            <a href="product.php">Product</a>
            <a href="about.html">About</a>
        </div>
    </div>

    <div class="payment-container">
        <h2>Formulir Pembayaran</h2>

        <!-- Tampilkan pesan feedback -->
        <?php if (!empty($message)): ?>
            <p style="color: green; font-weight: bold;"> <?php echo htmlspecialchars($message); ?> </p>
        <?php endif; ?>

        <form id="payment-form" action="payment.php" method="POST">
            <!-- Nama Lengkap -->
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" id="address" name="address" placeholder="Masukkan alamat Anda" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>

            <!-- Nomor Telepon -->
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon Anda" required>
            </div>

            <!-- Kode Pos -->
            <div class="form-group">
                <label for="zipcode">Kode Pos</label>
                <input type="text" id="zipcode" name="zipcode" placeholder="Masukkan kode pos Anda" required>
            </div>

            <!-- Metode Pembayaran -->
            <div class="form-group payment-methods">
                <label>Metode Pembayaran</label>
                <div class="payment-category">
                    <h3>E-Wallet</h3>
                    <div class="payment-options">
                        <label><input type="radio" name="payment-method" value="GoPay" required> GoPay</label><br>
                        <label><input type="radio" name="payment-method" value="DANA" required> DANA</label><br>
                        <label><input type="radio" name="payment-method" value="ShopeePay" required> ShopeePay</label><br>
                        <label><input type="radio" name="payment-method" value="LinkAja" required> LinkAja</label><br>
                        <label><input type="radio" name="payment-method" value="OVO" required> OVO</label>
                    </div>
                </div>

                <div class="payment-category">
                    <h3>Convenience Store</h3>
                    <div class="payment-options">
                        <label><input type="radio" name="payment-method" value="Alfamart" required> Alfamart</label><br>
                        <label><input type="radio" name="payment-method" value="Indomaret" required> Indomaret</label>
                    </div>
                </div>

                <div class="payment-category">
                    <h3>Virtual Account</h3>
                    <div class="payment-options">
                        <label><input type="radio" name="payment-method" value="BNI" required> BNI</label><br>
                        <label><input type="radio" name="payment-method" value="BRI" required> BRI</label><br>
                        <label><input type="radio" name="payment-method" value="Mandiri" required> Mandiri</label><br>
                        <label><input type="radio" name="payment-method" value="BCA" required> BCA</label>
                    </div>
                </div>

                <div class="payment-category">
                    <h3>Cash on Delivery (COD)</h3>
                    <div class="payment-options">
                        <label><input type="radio" name="payment-method" value="COD" required> COD</label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" id="checkout-btn">Bayar Sekarang</button>
        </form>
    </div>

    <div class="footer">
        <div class="footer-column">
            <h3>SPONSORED BY:</h3>
            <p>MYKONOS PERFUME</p>
            <p>HINT PERFUME</p>
            <p>ONIX PERFUME</p>
            <p>PROJECT1945</p>
            <p>ZIMAYA PERFUME</p>
            <p>DAVIDOFF PERFUME</p>
            <p>BALI SURFERS PERFUME</p>
            <p>SAFF&C0 PERFUME</p>
        </div>

        <div class="footer-column">
            <h3>ADDRESS</h3>
            <p>Jl. Taman Malaka Selatan No.8,</p>
            <p>RT.8/RW.8, Pd. Klp.,</p>
            <p>Kec. Duren Sawit,</p>
            <p>Kota Jakarta Timur.</p>
        </div>

        <div class="footer-column">
            <h3>CONTACT US</h3>
            <a href="https://wa.me/+6285777498629" target="_blank">
                <img src="img/wa.png" alt="WhatsApp">
            </a>
            <a href="https://www.instagram.com/gienzazdn_/" target="_blank">
                <img src="img/ig.jpg" alt="Instagram">
            </a>
            <a href="mailto:gienza144@gmail.com" target="_blank">
                <img src="img/email.png" alt="Email">
            </a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
