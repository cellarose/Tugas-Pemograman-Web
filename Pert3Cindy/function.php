<?php
function LuasLingkaran($r){
    $luas = 3.14 *($r*$r);
    return $luas;
}
echo "Luas Lingkaran :".LuasLingkaran(5);
echo "<hr>";
function kosong($a,$b){
    $hasil = $a + $b;
    return $hasil;
}
echo "Penjumlahan 5 + 6 :".kosong(5,6)."<br />";
echo "Penjumlahan 10 + 30 :".kosong(10,30)."<br />";
echo "<hr />";
function FormatRupiah($angka){
    $rupiah = "Rp. ".number_format($angka,2,",",".");
    return $rupiah;
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Sepatu</td>
        <td><?= FormatRupiah(40000);?></td>
        <td>4</td>
        <td><?= FormatRupiah(160000);?></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Baju</td>
        <td><?= FormatRupiah(50000);?></td>
        <td>5</td>
        <td><?= FormatRupiah(250000);?></td>
    </tr>
    <tr>
        <td>3</td>
        <td>Tas</td>
        <td><?= FormatRupiah(120000);?></td>
        <td>2</td>
        <td><?= FormatRupiah(240000);?></td>
    </tr>
</table>
