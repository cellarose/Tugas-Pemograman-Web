<?php
$nilai = array(10,20,30,10,20,30,10,20,30,10,20,30);
echo $nilai[0].'<br />';
echo $nilai[1].'<br />';
echo $nilai[2].'<br />';
echo "<hr />";
foreach($nilai as $nilaibaru){
    echo $nilaibaru.'<br />';
}
echo "<hr />";
$mhs = array(
    "nama" => "Santoso",
    "usia" => 20,
    "alamat" => "Tanjung Pura",
    "prodi" => "Manajemen Informatika"
);
echo "Nama mahasiswa : $mhs[nama] <br />";
echo "Usia : $mhs[usia] <br />";
echo "Alamat : $mhs[alamat] <br />";
echo "Prodi : $mhs[prodi] <br />";
echo "<hr />";
$nilaimhs = array(
    array(90,85,100),
    array(95,75,80),
    array(90,75,88)
);
echo $nilaimhs[0][0]." ";
echo $nilaimhs[0][1]." ";
echo $nilaimhs[0][2]."<br />";
echo $nilaimhs[1][0]." ";
echo $nilaimhs[1][1]." ";
echo $nilaimhs[1][2]." ";
echo "<hr />";

$nilaimahasiswa = array(
    array(
        "nama" => "Santoso",
        "tugas" => 70,
        "uts" => 75,
        "uas" => 70,
    ),
    array(
        "nama" => "Santi",
        "tugas" => 75,
        "uts" => 80,
        "uas" => 90,
    ),
    array(
        "nama" => "Sinta",
        "tugas" => 85,
        "uts" => 90,
        "uas" => 100,
    )
    );
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Nilai Tugas</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
    </tr>
<?php
    $no=0;
    foreach($nilaimahasiswa as $nilai){
        $no++;
    ?>
        <tr>
            <td><?= $no;?></td>
    <?php
        foreach($nilai as $key=>$value){
        ?>
            <td><?= $value;?></td>
        <?php
        }
        ?>
        </tr>
    <?php
    }
?>