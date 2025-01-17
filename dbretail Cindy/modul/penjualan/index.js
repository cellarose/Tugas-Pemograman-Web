$(document).ready(function () {
    $("#tabelDataPenjualan").DataTable();
    updateTabelPenjualan();
  
    // Menambahkan event listener pada input bayar
    $("#bayar").on("input", function () {
      hitungKembalian(); // Panggil fungsi hitungKembalian ketika bayar berubah
    });
  });
  
  function pilihBarang() {
    var select = document.getElementById("barang");
    var selectedOption = select.options[select.selectedIndex];
    var idBarang = selectedOption.value;
    var stok = selectedOption.getAttribute("data-stok");
    var harga = selectedOption.getAttribute("data-harga");
  
    document.getElementById("stok").value = stok;
    document.getElementById("harga").value = harga;
  }
  
  function hitungTotalHarga() {
    var jumlah = document.getElementById("jumlah").value;
    var harga = document.getElementById("harga").value;
    var totalHarga = jumlah * harga;
  
    document.getElementById("totalharga").value = totalHarga;
  }
  
  function tambahItem() {
    var barang = document.getElementById("barang");
    var idBarang = barang.value;
    var namaBarang =
      barang.options[barang.selectedIndex].getAttribute("nama-barang");
    var jumlah = document.getElementById("jumlah").value;
    var harga = document.getElementById("harga").value;
    var totalHarga = document.getElementById("totalharga").value;
  
    // Simpan ke local storage
    var penjualan = JSON.parse(localStorage.getItem("penjualan")) || [];
    penjualan.push({
      idBarang: idBarang,
      namaBarang: namaBarang,
      jumlah: jumlah,
      harga: harga,
      totalHarga: totalHarga,
    });
  
    localStorage.setItem("penjualan", JSON.stringify(penjualan));
  
    // Update tabel penjualan
    updateTabelPenjualan();
  
    // Kosongkan form
    kosongkanForm();
  }
  
  function kosongkanForm() {
    document.getElementById("barang").value = "";
    document.getElementById("stok").value = "";
    document.getElementById("jumlah").value = "";
    document.getElementById("harga").value = "";
    document.getElementById("totalharga").value = "";
  }
  
  function resetPenjualan() {
    // Hapus semua data di local storage
    localStorage.removeItem("penjualan");
    localStorage.removeItem("totalbayar");
  
    // Reload halaman
    location.reload();
  }
  
  function hitungTotalBayar() {
    var penjualan = JSON.parse(localStorage.getItem("penjualan")) || [];
    var totalBayar = 0;
  
    for (var i = 0; i < penjualan.length; i++) {
      totalBayar += parseFloat(penjualan[i].totalHarga);
    }
  
    // Simpan total bayar ke local storage
    localStorage.setItem("totalbayar", totalBayar);
  
    // Konversi ke format rupiah
    var totalBayarIDR = totalBayar.toLocaleString("id-ID", {
      style: "currency",
      currency: "IDR",
      minimumFractionDigits: 0,
    });
  
    document.getElementById("totalBayar").textContent = totalBayarIDR;
    document.getElementById("modalTotalBayar").value = totalBayar;
  }
  
  function updateTabelPenjualan() {
    var penjualan = JSON.parse(localStorage.getItem("penjualan")) || [];
    var tabelPenjualan = $("#tabelPenjualan").DataTable();
  
    tabelPenjualan.clear();
  
    for (var i = 0; i < penjualan.length; i++) {
      tabelPenjualan.row
        .add([
          i + 1,
          penjualan[i].namaBarang,
          penjualan[i].jumlah,
          penjualan[i].harga,
          penjualan[i].totalHarga,
        ])
        .draw(false);
    }
  
    hitungTotalBayar();
  }
  
  function simpanPenjualan() {
    // Simpan ke database
    var penjualan = JSON.parse(localStorage.getItem("penjualan")) || [];
    var totalBayar = localStorage.getItem("totalbayar");
    var bayar = localStorage.getItem("bayar");
    var kembalian = localStorage.getItem("kembalian");
  
    $.ajax({
      url: "/MuhammadAulia/dbretail/modul/penjualan/proses.php",
      method: "POST",
      data: {
        penjualan: JSON.stringify(penjualan),
        totalBayar: totalBayar,
        bayar: bayar,
        kembalian: kembalian,
      },
      success: function (response) {
        resetPenjualan();
        location.reload();
      },
    });
  }
  
  function hitungKembalian() {
    var bayar = parseFloat(document.getElementById("bayar").value) || 0; // Jika input kosong, anggap 0
    var totalBayar = parseFloat(localStorage.getItem("totalbayar")) || 0; // Ambil total bayar dari local storage
    var kembalian = bayar - totalBayar; // Hitung kembalian
  
    // Simpan ke local storage
    localStorage.setItem("bayar", bayar);
    localStorage.setItem("kembalian", kembalian);
  
    // Tampilkan kembalian di input kembalian
    document.getElementById("kembalian").value = kembalian;
  }