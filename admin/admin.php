<?php
// Koneksi database
$db = mysqli_connect("localhost", "root", "", "todo"); // username default = root, password = kosong, nama db = todo

// ambil/query data dari tabel users
$result = mysqli_query($db, "SELECT * FROM users"); //query untuk menampilkan data dari tabel user
if(!$result) {
    echo mysqli_error($db); //jika gagal query untuk menampilkan data, tampilkan error
}
// // ambil (fetch) data users dari objek result
// while ($usr = mysqli_fetch_assoc($result)){// mengembalikan array asosiatif (nama kolom) dari hasil query
//     var_dump($usr["username"]); // menampilkan data hasil query ke layar
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1> Daftar User </h1>
<table border="1" cellpadding= "10" cellspacing= "0">

    <tr>
        <th>Id.</th> 
        <th>Username</th>
        <th>Password</th>
        <th>Aksi</th>
    </tr>
<?php $i = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($result)) :?>
    <tr>
        <td><?= $i;?></td>
        <td><?= $row["username"];?></td>
        <td><?= $row["password"];?></td>
        <td><a href="">Hapus</a>
        <a href="">Selesai</a></td>
    </tr>
    <?php $i++; ?>
    <?php  endwhile; ?>
</table>




</body>
</html>