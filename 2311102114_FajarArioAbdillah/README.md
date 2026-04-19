<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM <br> APLIKASI BERBASIS PLATFORM </h1>
  <br />
  <h3>MODUL 11 12 13 <br> Laravel dan Database </h3>
  <br />
  <img width="512" height="512" alt="telyu" src="https://github.com/user-attachments/assets/724a3291-bcf9-448d-a395-3886a8659d79" />
  <br />
  <br />
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Fajar Ario Abdillah</strong>
    <br>
    <strong>2311102114</strong>
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

## Website
Website adalah kumpulan halaman yang dapat diakses melalui internet yang digunakan untuk menyampaikan informasi, melakukan transaksi, atau menyediakan layanan tertentu. Dalam konteks digitalisasi restoran, website berfungsi sebagai media promosi dan penjualan produk secara online.

## Framework
Framework adalah kerangka kerja yang digunakan untuk mempermudah pengembangan aplikasi dengan menyediakan struktur dan fungsi dasar. Penggunaan framework dapat mempercepat proses pengembangan serta membuat kode lebih terstruktur.

## Laravel

### Pengertian Laravel

Laravel merupakan salah satu framework berbasis PHP yang digunakan untuk mengembangkan aplikasi web dengan lebih mudah, cepat, dan terstruktur. Laravel pertama kali dikembangkan oleh Taylor Otwell dan dirancang untuk menyederhanakan proses pengembangan aplikasi dengan menyediakan berbagai fitur bawaan yang lengkap. Framework ini menggunakan konsep arsitektur Model-View-Controller (MVC) yang memisahkan antara logika aplikasi, tampilan, dan pengelolaan data sehingga memudahkan dalam pengembangan dan pemeliharaan sistem.

Laravel banyak digunakan karena memiliki sintaks yang sederhana, elegan, dan mudah dipahami oleh pengembang, baik pemula maupun profesional. Selain itu, Laravel juga menyediakan berbagai fitur modern yang mendukung pengembangan aplikasi web secara efisien dan aman.

###  Kelebihan Laravel

Beberapa kelebihan dari Laravel antara lain sebagai berikut:
1. Struktur kode yang rapi dan terorganisir
2. Mempercepat proses pengembangan
3. Keamanan yang baik
4. Sintaks yang mudah dipahami
5. Dukungan komunitas yang besar

### Fitur Utama Laravel

Laravel menyediakan berbagai fitur yang mendukung pengembangan aplikasi web, antara lain:
1. Model-View-Controller (MVC)
2. Routing
3. Migration
4. Eloquent ORM (Object Relational Mapping)
5. Blade Template Engine

## Konsep MVC (Model-View-Controller)

Model-View-Controller (MVC) merupakan salah satu pola arsitektur perangkat lunak yang digunakan untuk memisahkan struktur aplikasi menjadi tiga bagian utama, yaitu Model, View, dan Controller. Tujuan dari penggunaan MVC adalah untuk memisahkan logika bisnis, tampilan, dan pengelolaan data sehingga aplikasi menjadi lebih terstruktur, mudah dikembangkan, serta mudah dalam proses pemeliharaan.

Pada framework Laravel, konsep MVC digunakan sebagai dasar dalam pengembangan aplikasi. Dengan adanya pemisahan ini, setiap bagian memiliki tanggung jawab yang berbeda sehingga pengembang dapat bekerja lebih sistematis dan efisien.

### 1. Model

Model merupakan bagian yang bertugas untuk mengelola data dan berinteraksi langsung dengan database. Model berfungsi untuk melakukan operasi seperti mengambil data, menyimpan data, memperbarui data, dan menghapus data dari database.

### 2. View

View merupakan bagian yang bertugas untuk menampilkan data kepada pengguna dalam bentuk antarmuka atau tampilan. View tidak mengandung logika bisnis, melainkan hanya berfungsi untuk menyajikan data yang telah diproses oleh controller.

### 3. Controller

Controller merupakan bagian yang berfungsi sebagai penghubung antara Model dan View. Controller menerima input dari pengguna, memproses data dengan bantuan model, kemudian mengirimkan hasilnya ke view untuk ditampilkan.

## Database

Database merupakan kumpulan data yang disimpan secara terstruktur dan sistematis sehingga dapat diakses, dikelola, dan diperbarui dengan mudah. Database digunakan untuk menyimpan berbagai jenis informasi yang dibutuhkan oleh suatu sistem, seperti data pengguna, produk, transaksi, dan lain sebagainya. Dengan adanya database, pengelolaan data menjadi lebih efisien, terorganisir, dan terhindar dari redundansi atau duplikasi data.

Dalam pengembangan aplikasi berbasis web, database memiliki peran yang sangat penting karena berfungsi sebagai tempat penyimpanan utama seluruh data yang digunakan oleh sistem. Data yang tersimpan di dalam database dapat diolah dan ditampilkan kembali kepada pengguna melalui aplikasi yang dibangun.

### Fungsi Database dalam Aplikasi

Database memiliki beberapa fungsi utama dalam sebuah aplikasi, antara lain sebagai berikut:
1. Menyimpan data secara terpusat
2. Mempermudah pengolahan data
3. Menjaga konsistensi data
4. Meningkatkan keamanan data
5. Mendukung pengembangan aplikasi

### Peran Database dalam Sistem yang Dibangun

Dalam sistem web festival makanan yang dikembangkan, database digunakan untuk menyimpan data produk restoran, seperti nama produk, harga, deskripsi, kategori, dan stok. Data tersebut nantinya akan diolah oleh sistem dan ditampilkan pada halaman utama website sehingga dapat dilihat oleh pengguna.

## MySQL

MySQL merupakan salah satu sistem manajemen basis data relasional atau Relational Database Management System (RDBMS) yang digunakan untuk menyimpan, mengelola, dan mengolah data dalam bentuk tabel. MySQL menggunakan bahasa SQL (Structured Query Language) sebagai standar untuk melakukan operasi terhadap database, seperti menambahkan, mengubah, menghapus, dan menampilkan data.

### Kelebihan MySQL

Beberapa kelebihan MySQL antara lain sebagai berikut:
1. Bersifat open-source
2. Mudah digunakan
3. Performa yang cepat dan stabil
4. Mendukung multi-user
5. Keamanan yang baik
6. Terintegrasi dengan berbagai teknologi

## Screenshot Output

### **halaman1.png** - Tampilan beranda/landing page Website Makanan Restoran Mas Jakobi.

![Bukti](assets/Screenshot%202026-04-19%20181018.png)

### **halaman2.png** - Tampilan halaman tambah produk yang langsung terintegrasi dengan database.
![Bukti](assets/Screenshot%202026-04-19%20181136.png)

### **halaman3.png** - Tampilan landing page setelah berhasil menambahkan produk.
![Bukti](assets/Screenshot%202026-04-19%20181613.png)

### **halaman4.png** - Tampilan page detail produk.
![Bukti](assets/Screenshot%202026-04-19%20183408.png)

### **halaman5.png** - Tampilan untuk page Edit/Update Produk.
![Bukti](assets/Screenshot%202026-04-19%20183743.png)