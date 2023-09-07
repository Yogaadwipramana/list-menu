<?php
$listmenu = [
    [
        'menu' => 'Nasi Goreng',
        'harga' => 10000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Mie Goreng',
        'harga' => 10000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Kwetiaw',
        'harga' => 15000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Es Jeruk',
        'harga' => 5000,
        'tipe' => 'minuman',
    ],
    [
        'menu' => 'Teh Manis',
        'harga' => 5000,
        'tipe' => 'minuman',
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Menu</title>
    <style>
        .container {
            border: 1px solid black;
            width: 500px;
        }
        li {
            text-align: left;
        }
    </style>
</head>
<body>
    <center>
        <div class="container">
            <h3>Daftar Menu</h3>
            <ol>
                <?php foreach ($listmenu as $key => $menu) : ?>
                    <li>
                        <p>Menu : <?= $menu['menu'] ?></p>
                        <p>Harga : Rp. <?= number_format($menu['harga'], 0, ',', '.') ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
        <br>
        <br>

        <!-- Bagian Input -->
        <form action="" method="post">
            <div class="container">
                <div style="display: flex; padding-left: 20px;">
                    <p>Pilih Makanan :</p>
                    <select name="makanan" style="width: 300px; height: 30px; margin-top: 10px;">
                        <option hidden selected>--Pilih--</option>
                        <?php foreach ($listmenu as $menu) : ?>
                            <?php if ($menu['tipe'] === 'makanan') : ?>
                                <option value="<?= $menu['menu'] ?>"><?= $menu['menu'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="display: flex; padding-left: 20px;">
                    <label for="jmlmakanan">Jumlah Makanan:</label>
                    <input type="number" id="jmlmakanan" name="jmlmakanan" min="1" value="1">
                </div>

                <div style="display: flex; padding-left: 20px;">
                    <p>Pilih Minuman :</p>
                    <select name="minuman" style="width: 300px; height: 30px; margin-top: 10px;">
                        <option hidden selected>--Pilih--</option>
                        <?php foreach ($listmenu as $menu) : ?>
                            <?php if ($menu['tipe'] === 'minuman') : ?>
                                <option value="<?= $menu['menu'] ?>"><?= $menu['menu'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="display: flex; padding-left: 20px;">
                    <label for="jmlminuman">Jumlah Minuman:</label>
                    <input type="number" id="jmlminuman" name="jmlminuman" min="1" value="1">
                </div>
                <br>
                <div class="submit">
                    <button type="submit" name="submit" style="width: 450px;">Beli</button>
                </div>
                <br>
            </div>
        </form>
        
        <br>
        <br>
        <div class="container">
            <h3>Daftar Pesanan Makanan</h3>

        <?php
        if(isset($_POST['submit'])) {
            $makanan_terpilih = $_POST['makanan'];
            $minuman_terpilih = $_POST['minuman'];
            $jumlah_makanan = (int)$_POST['jmlmakanan'];
            $jumlah_minuman = (int)$_POST['jmlminuman'];

            $total_makanan = 0;
            $total_minuman = 0;
            $total_pesanan = 0;
            
            if ($jumlah_makanan > 0) {
                echo "{$makanan_terpilih} ({$jumlah_makanan} porsi)<br>";
            }

            // Menampilkan pesanan minuman jika ada
            if ($jumlah_minuman > 0) {
                echo "{$minuman_terpilih} ({$jumlah_minuman} porsi)<br>";

            // menghitung jumlah total yang dibeli
            foreach ($listmenu as $menu) {
                if ($menu['menu'] === $makanan_terpilih && $menu['tipe'] === 'makanan') {
                    $total_makanan = $menu['harga'] * $jumlah_makanan;
                } elseif ($menu['menu'] === $minuman_terpilih && $menu['tipe'] === 'minuman') {
                    $total_minuman = $menu['harga'] * $jumlah_minuman;
                }
            }
            
            $total_pesanan = $total_makanan + $total_minuman;
            echo "<center>Total Makanan: Rp. " . number_format($total_makanan, 0, ',', ',') . "</center>";
            echo "<center>Total Minuman: Rp. " . number_format($total_minuman, 0, ',', ',') . "</center>";
            echo "<center>Total : Rp. " . number_format($total_pesanan, 0, ',', ',') . "</center>";
        }     
            }  
        ?>
            </ul>
        </div>
            </ul>
        </div>
    </center>
</body>
</html>
