<?php
include 'koneksi.php';
$conn->close(); // Tutup koneksi

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Perfume Co.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index.css">
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
        <div class="cart-icon">
            <a href="javascript:void(0);" onclick="showPopupCart()">
                <i class="fa fa-shopping-cart"></i>
                <span id="cartCount" class="cart-count">0</span> <!-- Notifikasi jumlah item -->
            </a>
        </div>  
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <img src="img/modelparfume.jpg" alt="Close-up of a man spraying perfume on his neck">
        <img src="img/parfume.png" alt="Hand holding a perfume bottle">
        <div class="text">
            <h1>Only highest for men</h1>
            <p>Discover the best perfumes crafted with the highest quality ingredients</p>
            <button onclick="window.location.href='product.php';">Shop Now</button>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2>One Perfume Co</h2>
        <p>"Indulge in a captivating collection of fragrances carefully crafted to enhance your individuality"</p>
        <p>"From timeless elegance to refreshing scents that inspire confidence and charm."</p>
    </div>                           
</div>
    </div>
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
          </div>
      </div>
    <script src="script.js"></script>
</body>
</html>

