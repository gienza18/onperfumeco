<?php
// Memasukkan file koneksi.php
include 'koneksi.php';

// Query untuk mengambil data produk dari database
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Perfume Co.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="product.css">
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
    <!-- Image Banner -->
    <div class="image">
        <img src="img/ongkir.jpg.jpeg" alt="Image" style="width: 100%; height: auto;">
    </div>

    <!-- Product Cards -->
    <div class="container">
        <!-- Product 1 -->
        <div class="card">
            <img src="img/mykonos.jpg" alt="Mykonos California EDP 50 ml">
            <a href="california.html" class="product-name" onclick="showDescription('description1')">Mykonos California</a>
            <p class="price">Rp 165.000</p>
            <button onclick="addToCart('Mykonos California', 165000, 'img/mykonos.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 2 -->
        <div class="card">
            <img src="img/balisurfer.jpg" alt="Bali Surfers EDP 100 ml">
            <a href="balisurfers.html" class="product-name" onclick="showDescription('description2')">Bali Surfers</a>
            <p class="price">Rp 225.000</p>
            <button onclick="addToCart('Bali Surfers Blue Point For Her', 225000, 'img/balisurfer.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 3 -->
        <div class="card">
            <img src="img/zimaya.jpg" alt="Zimaya Sharaf Blend 100 ml">
            <a href="zimaya.html" class="product-name" onclick="showDescription('description3')">Zimaya Sharaf Blend</a>
            <p class="price">Rp 365.000</p>
            <button onclick="addToCart('Zimaya Sharaf Blend', 365000, 'img/zimaya.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 4 -->
        <div class="card">
            <img src="img/davidoff.jpg" alt="Davidoff Cool Water 125ml">
            <a href="davidoff.html" class="product-name" onclick="showDescription('description4')">Davidoff Cool Water</a>
            <p class="price">Rp 598.000</p>
            <button onclick="addToCart('Davidoff Cool Water', 598000, 'img/davidoff.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 5 -->
        <div class="card">
            <img src="img/bonfire.jpg" alt="Bonfire Vanilla EDP 50ml">
            <a href="bonfire.html" class="product-name" onclick="showDescription('description5')">Mykonos Bonfire Vanilla</a>
            <p class="price">Rp 150.000</p>
            <button onclick="addToCart('Mykonos Bonfire Vanilla', 150000, 'img/bonfire.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 6 -->
        <div class="card">
            <img src="img/senoparty.jpg" alt="Seno Party EDP 50ml">
            <a href="senoparty.html" class="product-name" onclick="showDescription('description6')">SenoParty</a>
            <p class="price">Rp 300.000</p>
            <button onclick="addToCart('ONIX SenoParty', 300000, 'img/senoparty.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 7 -->
        <div class="card">
            <img src="img/solaris.jpg" alt="Solaris EDP 30ml">
            <a href="solaris.html" class="product-name" onclick="showDescription('description7')">Solaris</a>
            <p class="price">Rp 215.000</p>
            <button onclick="addToCart('Solaris', 215000, 'img/solaris.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 8 -->
        <div class="card">
            <img src="img/hintIdentity.jpg" alt="hint identity EDP 50ml">
            <a href="hint.html"class="product-name" onclick="showDescription('description8')">Hint identity</a>
            <p class="price">Rp 154.000</p>
            <button onclick="addToCart('Hint identity', 154000, 'img/hintidentity.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 9 -->
        <div class="card">
            <img src="img/luminos.jpg" alt="Mykonos luminos EDP 50ml">
            <a href="luminos.html"class="product-name" onclick="showDescription('description9')">Mykonos luminos</a>
            <p class="price">Rp 213.000</p>
            <button onclick="addToCart('Mykonos luminos', 213000, 'img/luminos.jpg')">ADD TO CART</button>
        </div>

        <!-- Product 10 -->
        <div class="card">
            <img src="img/Project1945.jpg" alt="Project 1945 EDP 80ml">
            <a href="1945.html"class="product-name" onclick="showDescription('description10')">Project1945</a>
            <p class="price">Rp 295.000</p>
            <button onclick="addToCart('Project 1945',295000, 'img/Project1945.jpg')">ADD TO CART</button>
        </div>
    </div>
<!-- Tombol Keranjang di Navbar -->
<div class="cart-icon">
    <a href="javascript:void(0);" onclick="showPopupCart()">
        <i class="fa fa-shopping-cart"></i>
        <span id="cartCount" class="cart-count">0</span> <!-- Notifikasi jumlah item -->
    </a>
</div>

<!-- Popup Cart -->
<div id="popup-cart" class="popup-cart">
    <div class="popup-cart-content">
        <button id="close-popup-cart" class="close-btn">&times;</button> <!-- Tombol silang untuk menutup -->
        <h3>Your Cart</h3>
        <div id="popup-cart-items" class="cart-items">
            <!-- Item cart akan muncul di sini -->
        </div>
        <div class="cart-total">
            <p id="popup-cart-total">Total: Rp 0</p>
        </div>
        <button id="checkout-btn">Checkout</button>
        
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
      <p>SAFF&CO PERFUME</p>
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
