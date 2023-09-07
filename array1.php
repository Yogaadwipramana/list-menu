<?php
$nilai = [80, 78, 72, 84, 92, 88];

// pisahkan dengan koma
$kalimat = implode(",",$nilai);
echo"Nilai :".$kalimat ."<br>";

// Nilai terbesar
$max = max($nilai);
echo "Nilai tertinggi: $max<br>";

// Nilai terkecil
$min = min($nilai);
echo "Nilai terkecil: $min<br>";

// Urutkan dari kecil ke besar
sort($nilai);
echo  "Urutan terkecil ke terbesar: " . implode(",", $nilai) . "<br>";

// Urutkan dari besar ke kecil
arsort($nilai);
echo "Urutan terbesar ke terkecil: " . implode(", ", $nilai) . "<br>";


//  rata-rata
// menjumlahkan semua nilai numerik dalam sebuah array. 
// count menghitnuug jumlah elemen
$rata_rata = array_sum($nilai) / count($nilai);
echo "Rata-rata: $rata_rata<br>";

// Bulatkan rata-rata
$hitungRata = round($rata_rata);
echo "Rata-rata (bulatkan): $hitungRata<br>";

//  Merubah nilai  72 menjadi 75)
// foreach untuk perulangan yang datanya dalam bentuk array.
// array splice($nilai, $key, 1, 75)
foreach ($nilai as &$nilai_siswa) {
    if ($nilai_siswa < 75) {
        $nilai_siswa = 75;
    }
}
echo "Perubahan nilai: " . implode(", ", $nilai) . "<br>";

// Mengurutkan terbesar ke terkecil dengan hasil yang baru
arsort($nilai);
echo  "Urutan terbesar ke terkecil : " . implode(",", $nilai) . "<br>";



