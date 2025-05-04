<?php
// Koneksi database
$db = mysqli_connect("localhost", "root", "", "todo"); // username default = root, password = kosong, nama db = todo

// ambil/query data dari tabel users
$result = mysqli_query($db, "SELECT * FROM users"); //query untuk menampilkan data dari tabel user

if(!$result) {
    echo mysqli_error($db); //jika gagal query untuk menampilkan data, tampilkan error
}

function query($query) {
    global $db; // mengglobalkan variabel db agar bisa digunakan dalam function
    $result = mysqli_query($GLOBALS['db'], $query);
    $rows = []; // array kosong untuk menampung data yang diambil dari database
    while ($row = mysqli_fetch_assoc($result)) { // mengambil data dari database
        $rows[] = $row; // menambahkan data ke dalam array
    }
    return $rows; // mengembalikan data yang sudah diambil dari database
}
function tambah($data) {
    global $db; 
    $username = htmlspecialchars($data["username"]); // htmlspecialchars untuk menghindari XSS (Cross-Site Scripting)
    $password = htmlspecialchars($data["password"]);

// query untuk menambahkan data ke dalam tabel users
$query = "INSERT INTO users VALUES ('', '$username', '$password')"; // kolom id kosongkan krn otomats
mysqli_query($db, $query); // eksekusi query

return mysqli_affected_rows($db); // mengembalikan jumlah baris yang terpengaruh oleh query terakhir
}

function hapus($id) {
    global $db; // mengglobalkan variabel db agar bisa digunakan dalam function
    mysqli_query($db, "DELETE FROM users WHERE id = $id"); // query untuk menghapus data dari tabel users berdasarkan id
    return mysqli_affected_rows($db); // mengembalikan jumlah baris yang terpengaruh oleh query terakhir
}
?>
