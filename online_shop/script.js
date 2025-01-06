class Cart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('cart')) || [];
    }
    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
    }    
}
// Fungsi untuk memperbarui tampilan keranjang dan notifikasi jumlah item di ikon keranjang
function updateCartNotification() {
    const cartCount = document.getElementById('cartCount');
    if (cartCount) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    }
}

// Fungsi untuk menampilkan popup cart
function showPopupCart() {
    const popupCart = document.getElementById('popup-cart');
    if (popupCart) {
        popupCart.style.display = 'flex'; // Tampilkan popup
    }
}

// Fungsi untuk menutup popup cart
function closePopupCart() {
    const popupCart = document.getElementById('popup-cart');
    if (popupCart) {
        popupCart.style.display = 'none'; // Sembunyikan popup
    }
}

// Fungsi untuk menambahkan produk ke keranjang
function addToCart(productName, price, imageUrl) {
    if (!productName || !price || !imageUrl) {
        alert('Product data is incomplete. Please try again.');
        return;
    }

    const existingProduct = cart.find(item => item.name === productName);
    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push({
            name: productName,
            price: price,
            imageUrl: imageUrl,
            quantity: 1,
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${productName} has been added to your cart!`);
    displayCart();
    updateCartNotification();
}

// Fungsi untuk menampilkan item di keranjang dalam popup
function displayCart() {
    const savedCart = localStorage.getItem('cart');
    try {
        cart = savedCart ? JSON.parse(savedCart) : [];
    } catch (error) {
        console.error('Error parsing cart data from localStorage:', error);
        cart = [];
    }

    const cartItemsContainer = document.getElementById('popup-cart-items');
    const totalElement = document.getElementById('popup-cart-total');
    if (!cartItemsContainer || !totalElement) return;

    cartItemsContainer.innerHTML = '';
    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        totalElement.textContent = 'Rp 0';
        return;
    }

    let total = 0;
    cart.forEach((item, index) => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('cart-item');
        itemDiv.innerHTML = `
            <img src="${item.imageUrl}" alt="${item.name}">
            <div>
                <p><strong>${item.name}</strong></p>
                <p>Price: Rp ${item.price.toLocaleString()}</p>
                <p>Quantity: ${item.quantity}</p>
                <p>Subtotal: Rp ${(item.price * item.quantity).toLocaleString()}</p>
                <button class="remove-btn" data-index="${index}">Remove</button>
            </div>
        `;
        cartItemsContainer.appendChild(itemDiv);
        total += item.price * item.quantity;
    });

    totalElement.textContent = `Total: Rp ${total.toLocaleString()}`;
    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', () => {
            const index = button.getAttribute('data-index');
            removeFromCart(index);
        });
    });
}

// Fungsi untuk menghapus item dari keranjang
function removeFromCart(index) {
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
    updateCartNotification();
}

// Fungsi untuk checkout
function checkout() {
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }

    // Simpan data keranjang di localStorage agar bisa diakses di halaman pembayaran
    localStorage.setItem('cart', JSON.stringify(cart));

    // Arahkan ke halaman pembayaran
    window.location.href = 'payment.php';
}

// Event listener untuk tombol Close popup cart
const closePopupCartButton = document.getElementById('close-popup-cart');
if (closePopupCartButton) {
    closePopupCartButton.addEventListener('click', closePopupCart);
}

// Event listener untuk tombol "Add to Cart" di halaman deskripsi produk
const addToCartButton = document.querySelector('.add-to-cart');
if (addToCartButton) {
    addToCartButton.addEventListener('click', () => {
        const productName = document.getElementById('product-name')?.textContent.trim();
        const priceText = document.getElementById('product-price')?.textContent.replace(/\D/g, '');
        const price = parseInt(priceText, 10);
        const imageUrl = document.getElementById('product-image')?.getAttribute('src');
        addToCart(productName, price, imageUrl);
    });
}
function goToProductPage() {
    // Navigasi kembali ke halaman produk
    window.location.href = 'product.php';
}

// Event listener untuk tombol "Add to Cart" di bagian lain
document.querySelectorAll('.add-to-cart-btn').forEach(button => {
    if (!button.dataset.eventAdded) {
        button.addEventListener('click', () => {
            const productName = button.getAttribute('data-name');
            const price = parseInt(button.getAttribute('data-price'), 10);
            const imageUrl = button.getAttribute('data-image');
            addToCart(productName, price, imageUrl);
        });
        button.dataset.eventAdded = true;
    }
});

// Event listener untuk tombol checkout di popup
const checkoutButton = document.getElementById('checkout-btn');
if (checkoutButton) {
    checkoutButton.addEventListener('click', checkout);
}

// Panggil fungsi untuk memperbarui tampilan cart dan notifikasi saat halaman dimuat
window.onload = () => {
    displayCart();
    updateCartNotification();
};

document.querySelectorAll('.payment-category').forEach(category => {
    category.addEventListener('click', function (event) {
        const options = this.querySelector('.payment-options');
        const isActive = options.classList.contains('active');

        // Mencegah event bubbling agar klik pada opsi tidak menutupnya
        event.stopPropagation();

        // Jangan menutup opsi jika aktif, cukup toggle jika tidak aktif
        if (!isActive) {
            // Tutup semua opsi lain
            document.querySelectorAll('.payment-options').forEach(option => option.classList.remove('active'));
            
            // Buka opsi yang diklik
            options.classList.add('active');
        }
    });
});

// Tambahkan event listener untuk mencegah metode tertutup saat memilih opsi
document.querySelectorAll('.payment-options input, .payment-options select').forEach(option => {
    option.addEventListener('click', function (event) {
        event.stopPropagation(); // Mencegah event bubbling agar opsi tetap terbuka
    });
});

// Fungsi untuk memperbarui notifikasi keranjang
function updateCartNotification() {
    const cartCount = document.getElementById('cartCount');
    if (cartCount) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    }
}

// Fungsi untuk menampilkan notifikasi pembayaran berhasil dan mengarahkan ke homepage
function confirmPayment() {
    // Tampilkan notifikasi pembayaran berhasil
    alert('Pembayaran berhasil! Terima kasih telah berbelanja.');
    // Kosongkan keranjang belanja
    localStorage.removeItem('cart');
    // Arahkan ke halaman utama (homepage)
    window.location.href = 'index.php';
}

// Fungsi untuk validasi form checkout dan memproses pembayaran
function handleCheckout() {
    // Ambil data dari form checkout
    const formData = {
        name: document.getElementById('name')?.value.trim() || '',
        address: document.getElementById('address')?.value.trim() || '',
        email: document.getElementById('email')?.value.trim() || '',
        phone: document.getElementById('phone')?.value.trim() || '',
        zipcode: document.getElementById('zipcode')?.value.trim() || '',
        paymentMethod: document.querySelector('input[name="payment-method"]:checked')?.value || 'Tidak dipilih',
    };

    // Validasi data form
    if (!formData.name || !formData.address || !formData.email || !formData.phone || !formData.zipcode) {
        alert('Mohon lengkapi semua data.');
        return; // Hentikan proses jika data tidak valid
    }

    // Validasi format email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(formData.email)) {
        alert('Email tidak valid.');
        return; // Hentikan proses jika email tidak valid
    }

    // Periksa apakah keranjang kosong
    const cartData = JSON.parse(localStorage.getItem('cart') || '[]');
    if (!Array.isArray(cartData) || cartData.length === 0) {
        alert('Keranjang Anda kosong!');
        return; // Hentikan proses jika keranjang kosong
    }

    // Jika validasi lolos, lakukan pembayaran
    confirmPayment();
}

// Pasang event listener untuk tombol "Bayar Sekarang"
window.onload = () => {
    const checkoutButton = document.getElementById('checkout-btn');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', handleCheckout);
    } else {
        console.warn('Tombol checkout tidak ditemukan.');
    }

    // Inisialisasi tampilan
    displayCart();
    updateCartNotification();
};
