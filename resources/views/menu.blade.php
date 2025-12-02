@extends('layout.layout')

<style>
    /* Floating Cart Button */
    #cart-btn {
        position: fixed;
        bottom: 25px;
        left: 20px;
        background: #ff6600;
        color: white;
        padding: 15px 18px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: bold;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        z-index: 499;
    }

    /* Slide Up Cart Panel */
    #cart-panel {
        position: fixed;
        bottom: -900px;
        left: 0;
        width: 100%;
        background: #fff;
        border-radius: 20px 20px 0 0;
        padding: 20px;
        box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.15);
        transition: .35s ease;
        z-index: 9999;
    }

    #cart-header {
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        margin-bottom: 10px;
    }

    #cart-items {
        max-height: 200px;
        overflow-y: auto;
        margin-bottom: 15px;
    }

    #cart-items div {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    #btn-checkout {
        width: 100%;
        padding: 12px;
        border: none;
        background: #0d6efd;
        color: white;
        border-radius: 10px;
        font-size: 16px;
    }

    .cart-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .qty-control {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .qty-btn {
        width: 28px;
        height: 28px;
        border: none;
        border-radius: 6px;
        background: #0d6efd;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }

    .qty-btn:hover {
        opacity: .85;
    }

    .qty-number {
        font-weight: bold;
        min-width: 20px;
        text-align: center;
        font-size: 16px;
    }

    /* Button PESAN full width */
    .menu-card .btn-pesan {
        width: 100%;
        margin-top: 10px;
        padding: 10px;
        border-radius: 8px;
        font-weight: 600;
    }
</style>


@section('content')
    <!-- Menu Section -->
    <section id="menu" class="menu section">



        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span class="description-title">Menu</span>
            <h2>Menu</h2>
            <p>Pilih menu favorit Anda dan langsung pesan untuk pengalaman makan yang lezat dan memuaskan.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <!-- Filters -->
                <div class="menu-filters isotope-filters mb-5" data-aos="fade-up" data-aos-delay="200">
                    <ul>
                        <li data-filter="*" class="filter-active">Semua Produk</li>
                        @foreach ($kategori as $k)
                            <li data-filter=".filter-{{ $k->nama }}">
                                {{ $k->nama }}
                            </li>
                        @endforeach
                    </ul>
                </div>


                <!-- Menu Items -->
                <div class="menu-grid isotope-container row gy-5" data-aos="fade-up" data-aos-delay="300">

                    @foreach ($produk as $p)
                        <div class="col-xl-4 col-lg-6 isotope-item filter-{{ strtolower($p->kategori->nama) }}">
                            <div class="menu-card">
                                <div class="menu-card-image">
                                    <img src="{{ asset('storage/produk/' . $p->foto) }}" class="img-fluid"
                                        alt="{{ $p->nama }}">
                                    <div class="price-overlay">Rp {{ number_format($p->harga, 0, ',', '.') }}</div>
                                </div>
                                <div class="menu-card-content">
                                    <h4>{{ $p->nama }}</h4>
                                    <p>{{ $p->deskripsi }}</p>

                                    <!-- Tombol PESAN -->
                                    <button class="btn btn-primary btn-pesan" data-id="{{ $p->id }}"
                                        data-name="{{ $p->nama }}" data-price="{{ $p->harga }}">
                                        🛒 Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- /menu-grid -->

            </div><!-- /isotope-layout -->

            {{-- ORDER SECTION --}}
            <!-- Floating Cart Button -->
            <div id="cart-btn">
                🛒 <span id="cart-count">0</span>
            </div>

            <!-- Slide Up Cart Panel -->
            <div id="cart-panel">
                <div id="cart-header">
                    <strong>Daftar Pesanan</strong>
                    <span id="close-cart">✕</span>
                </div>

                <div id="cart-items"></div>
                <div class="row">
                    <div class="row mb-2 col-lg-6">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input name="customer_name" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-2 col-lg-6">
                        <label class="col-sm-3 col-form-label">No Meja</label>
                        <div class="col-sm-9">
                            <input name="table_number" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-lg-12">
                        <label class="col-form-label">Catatan</label>
                        <textarea name="note" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div id="cart-total">
                    Total: Rp <span id="total-price">0</span>
                </div>

                <button id="btn-checkout">Pesan Sekarang</button>
            </div>


        </div><!-- /container -->

    </section><!-- /Menu Section -->
    <!-- Modal Sukses -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4">
                <h4 class="text-success mb-3">Pesanan Berhasil!</h4>
                <p>Pesanan Anda sedang diproses.</p>
                <button class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        let orders = [];

        // Buka panel
        document.getElementById("cart-btn").onclick = function() {
            document.getElementById("cart-panel").style.bottom = "0";
        };

        // Tutup panel
        document.getElementById("close-cart").onclick = function() {
            document.getElementById("cart-panel").style.bottom = "-900px";
        };

        // Tambah pesanan dari tombol menu
        document.querySelectorAll(".btn-pesan").forEach(btn => {
            btn.addEventListener("click", function() {
                addOrder(this.dataset.id, this.dataset.name, parseFloat(this.dataset.price));
            });
        });

        function addOrder(id, name, price) {
            let item = orders.find(o => o.name === name);

            if (item) {
                item.qty += 1;
            } else {
                orders.push({
                    id: id,
                    name,
                    price,
                    qty: 1
                });

            }

            updateCartUI();
        }

        function increaseQty(index) {
            orders[index].qty++;
            updateCartUI();
        }

        function decreaseQty(index) {
            orders[index].qty--;
            if (orders[index].qty <= 0) {
                orders.splice(index, 1);
            }
            updateCartUI();
        }

        function updateCartUI() {
            // Update badge jumlah item total
            let totalItems = orders.reduce((sum, o) => sum + o.qty, 0);
            document.getElementById("cart-count").textContent = totalItems;

            const list = document.getElementById("cart-items");
            list.innerHTML = orders.map((o, i) => `
        <div class="cart-row">
            <div>
                • ${o.name} – ${o.qty} porsi
            </div>

            <div class="qty-control">
                <button class="qty-btn" onclick="decreaseQty(${i})">−</button>
                <span class="qty-number">${o.qty}</span>
                <button class="qty-btn" onclick="increaseQty(${i})">+</button>
            </div>
        </div>
    `).join("");

            // Hitung total harga
            let total = orders.reduce((acc, o) => acc + (o.price * o.qty), 0);
            document.getElementById("total-price").textContent = total.toLocaleString();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById("btn-checkout").addEventListener("click", function() {
                const customerName = document.querySelector('input[name="customer_name"]').value;
                const tableNumber = document.querySelector('input[name="table_number"]').value;
                const note = document.querySelector('textarea[name="note"]').value;
                const total = orders.reduce((sum, o) => sum + o.price * o.qty, 0);

                if (orders.length === 0) return alert("Silakan pilih menu terlebih dahulu!");
                if (!customerName.trim() || !tableNumber.trim()) return alert(
                    "Nama dan No. Meja wajib diisi!");

                fetch("{{ route('order.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            customer_name: customerName,
                            table_number: tableNumber,
                            note,
                            total_price: total,
                            items: orders
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            sendToWhatsApp(customerName, tableNumber, note, total);
                            // Hapus pesanan dari UI
                            orders = [];
                            updateCartUI();
                            document.getElementById("cart-panel").style.bottom = "-900px";

                            // Tampilkan modal sukses
                            let modal = new bootstrap.Modal(document.getElementById("successModal"));
                            setTimeout(() => {
                                modal.show();
                            }, 1000); // Delay 1 detik biar WhatsApp kebuka dulu
                        }
                    })
                    .catch(err => console.error(err));

            });

        });

        function sendToWhatsApp(name, table, note, total) {
            let message = `Halo, saya ingin pesan:\n\n`;

            orders.forEach(o => {
                message += `• ${o.name} x ${o.qty} = Rp ${o.price * o.qty}\n`;
            });

            message += `\n👤 Nama: ${name}\n`;
            message += `🍽 No Meja: ${table}\n`;
            if (note) message += `📝 Catatan: ${note}\n`;
            message += `\nTotal: Rp ${total.toLocaleString()}`;

            const phone = "6281234567890"; // GANTI NOMOR ADMIN ANDA
            const url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;

            window.open(url, "_blank");
        }
    </script>
@endsection
