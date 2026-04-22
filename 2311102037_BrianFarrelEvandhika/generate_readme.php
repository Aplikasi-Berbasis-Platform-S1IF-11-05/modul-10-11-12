<?php

$header = <<<EOT
<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 10, 11, 12 <br> Laravel dan Database </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Brian Farrel Evandhika</strong>
    <br>
    <strong>2311102037</strong>
    <br>
    <strong>S1 IF-11-REG05</strong>
  </p>
  <br />
  <h3>Dosen Pengampu :</h3>
  <p>
    <strong>Dedi Agung Prabowo, S.Kom., M.Kom</strong>
  </p>
  <br />
  <br />
  <h4>Asisten Praktikum :</h4>
  <strong>Apri Pandu Wicaksono </strong>
  <br>
  <strong>Hamka Zaenul Ardi</strong>
  <br />
  <h3>LABORATORIUM HIGH PERFORMANCE <br>FAKULTAS INFORMATIKA <br>UNIVERSITAS TELKOM PURWOKERTO <br>2026 </h3>
</div>

<hr>


# Dasar Teori

<p align="justify">
Laravel adalah framework berbasis PHP yang digunakan untuk membangun aplikasi web secara terstruktur dan efisien. Laravel menerapkan konsep MVC (Model-View-Controller) yang memisahkan logika aplikasi, tampilan, dan pengelolaan alur program sehingga memudahkan pengembangan dan pemeliharaan. Framework ini juga menyediakan berbagai fitur seperti routing, middleware, autentikasi, serta Eloquent ORM yang memungkinkan interaksi dengan database menggunakan pendekatan berbasis objek tanpa harus menulis query SQL secara langsung.
</p>

<p align="justify">
MySQL merupakan sistem manajemen basis data relasional (RDBMS) yang digunakan untuk menyimpan dan mengelola data dalam bentuk tabel dengan menggunakan bahasa SQL. MySQL bersifat open-source, cepat, dan banyak digunakan dalam pengembangan aplikasi web. Dalam implementasinya, Laravel dan MySQL saling terintegrasi, di mana Laravel mengatur logika aplikasi dan proses data, sedangkan MySQL berfungsi sebagai media penyimpanan data, sehingga pengelolaan data menjadi lebih mudah, efisien, dan terstruktur.
</p>

# Tugas 10,11,12 - Laravel dan Database
EOT;

$files_to_include = [
    'resources/views/welcome.blade.php' => 'html',
    'app/Http/Controllers/ProductController.php' => 'php',
    'app/Models/Product.php' => 'php',
    'routes/web.php' => 'php'
];

$content = $header . "\n";
$i = 1;
foreach ($files_to_include as $file => $lang) {
    $content .= "## $i. Source Code $file\n";
    $content .= "```$lang\n";
    $content .= file_get_contents($file);
    $content .= "```\n\n";
    $i++;
}

$footer = <<<EOT
# Screenshots Output
<img src="ss-modul10.png" alt="preview" style="width:100%; max-width:900px;">

# Penjelasan
<p align="justify">
Pada praktikum ini, telah dibuat sebuah aplikasi web sederhana menggunakan framework Laravel. Aplikasi ini menampilkan sebuah halaman festival makanan bertajuk "Festival Makanan Ngawi", dimana produk-produk yang ditampilkan diambil dari database MySQL menggunakan Eloquent ORM. 
</p>
<p align="justify">
File <code>welcome.blade.php</code> digunakan sebagai halaman utama (View) yang menampilkan daftar makanan menggunakan framework Tailwind CSS agar tampilannya menarik dan responsif. Data yang ditampilkan pada halaman ini dikelola oleh <code>ProductController.php</code>, yang mana bertugas untuk mengambil seluruh data produk dari database menggunakan model <code>Product.php</code> dan mengirimkannya ke <i>view</i>. Model <code>Product.php</code> ini merepresentasikan tabel products dalam database dan mengatur kolom mana saja yang dapat diisi melalui properti <code>\$fillable</code>. Selanjutnya, semua alur <i>request</i> untuk rute utama <code>/</code> diatur di dalam <code>web.php</code> agar memanggil fungsi <code>index()</code> pada controller tersebut. Gambar hasil eksekusi dari source code tersebut dapat dilihat pada bagian Screenshots Output di atas.
</p>
EOT;

$content .= $footer . "\n";

file_put_contents('README.md', $content);
echo "README.md generated successfully\n";

