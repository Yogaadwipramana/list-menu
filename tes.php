<?php
$menus =  [
    [
        "nama" => "Nasi Goreng",
        "harga" => 15000,
        "type" => "makanan"
    ],
    [
        "nama" => "Mie Goreng",
        "harga" => 10000,
        "type" => "makanan"
    ],
    [
        "nama" => "Kwetiaw",
        "harga" => 15000,
        "type" => "makanan"
    ],
    [
        "nama" => "Es Jeruk",
        "harga" => 5000,
        "type" => "minuman"
    ], 
    [
        "nama" => "Es Teh Manis",
        "harga" => 5000,
        "type" => "minuman"
    ],
];


$pesanMakanan = "";
$pesanMinuman = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $makanan = $_POST["makanan"];
    $jumlahMakanan = $_POST["jumlahmak"];
    $minuman = $_POST["minuman"];
    $jumlahMinuman = $_POST["jumlahmin"];

   
    $totalMakanan = 0;
    $totalMinuman = 0;

    foreach ($menus as $menu) {
        if ($menu["nama"] === $makanan) {
            $totalMakanan = $menu["harga"] * $jumlahMakanan;
        } elseif ($menu["nama"] === $minuman) {
            $totalMinuman = $menu["harga"] * $jumlahMinuman;
        }
    }


    $totalPesanan = $totalMakanan + $totalMinuman;

 
    if (($jumlahMakanan + $jumlahMinuman) > 5) {
        $diskon = 0.1 * $totalPesanan; // 10% diskon
        $totalPesanan -= $diskon;
    }

 
    $pesanMakanan = "Pesanan Makanan ($makanan x $jumlahMakanan) - Total: Rp $totalMakanan";
    $pesanMinuman = "Pesanan Minuman ($minuman x $jumlahMinuman) - Total: Rp $totalMinuman";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Online</title>
</head>
<style>
    div {
        width: 500px;
        height: 300px;
    }
    .border {
        border: 1px solid black;
        margin-left: 400px;
    }
    .m {
        text-align: center;
    }
    .input {
        border: 1px solid black;
        margin-top: -100px;
        width: 500px;
        height: 200px;
        padding-bottom: 100px;
    }
    .out {
        border: 1px solid black;
        margin-top: -100px;
        width: 500px;
        height: 200px;
        margin-top: 100px;
    }
</style>
<body>
<div class="container">
    <div class="border">
        <div class="m"> <h1>Menu</h1></br> 
            <?php foreach ($menus as $menu) : ?>
                <div class="menu">
                    <p><?php echo $menu['nama'] ?> - Rp <?php echo $menu['harga'] ?></p>
            <?php endforeach; ?>
        </div> 
    </div>
</div>
</div>
<div class="input">
    <h1>Order</h1></br> 
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="makanan">Pilih Makanan:</label>
        <select id="makanan" name="makanan">
            <?php foreach ($menus as $menu) : ?>
                <?php if ($menu['type'] === 'makanan') : ?>
                    <option value="<?php echo $menu['nama'] ?>"><?php echo $menu['nama'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="jumlahmak">Jumlah Makanan:</label>
        <input type="number" id="jumlahmak" name="jumlahmak" min="1" value="1">
        <br><br>
        <label for="minuman">Pilih Minuman:</label>
        <select id="minuman" name="minuman">
            <?php foreach ($menus as $menu) : ?>
                <?php if ($menu['type'] === 'minuman') : ?>
                    <option value="<?php echo $menu['nama'] ?>"><?php echo $menu['nama'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="jumlahmin">Jumlah Minuman:</label>
        <input type="number" id="jumlahmin" name="jumlahmin" min="1" value="1">
        <br><br>
        <input type="submit" value="Pesan">
    </form>
</div>




<div class="out">
    <?php if ($pesanMakanan !== "" || $pesanMinuman !== "") : ?>
        <h2>Detail Pesanan:</h2>
        <?php if ($pesanMakanan !== "") : ?>
            <p><?php echo $pesanMakanan; ?></p>
        <?php endif; ?>
        <?php if ($pesanMinuman !== "") : ?>
            <p><?php echo $pesanMinuman; ?></p>
        <?php endif; ?>
        <p>Total Pesanan Anda: Rp <?php echo number_format($totalPesanan, 0, ',', '.'); ?></p>
    <?php endif; ?>
</div>
</body>
</html>