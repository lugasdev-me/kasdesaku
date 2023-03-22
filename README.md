### HEROKU LINK __ http://kasdesaku.herokuapp.com/ __
[Akun superadmin]
    +email: superadmin@gmail.com
    +password: superadmin

### KASDESAKU - PROJECT SISTEM INFORMASI
Project ini dibuat menggunakan Laravel tanpa penambahan Framework lainnya. Template pada web ini merupakan hasil download dari argon
Berikut sc template: <a href="https://www.creative-tim.com/product/argon-dashboard">LINK ARGON</a>

### TEKNOLOGI
1. Laravel
2. Sail
3. Ubuntu
4. Heroku
5. Git

### FITUR
1. Register & Login (Authentication)
2. CRUD Pemasukan dan Pengeluaran
3. Keamanan Superadmin (selain superadmin hanya dapat membaca riwayat kas saja tanpa bisa mengedit)
4. Export Excel dengan library maatwebsite/excel
5. Grafik menggunakan JavaScript

## Cara Install
__git clone <link:github>
__masuk ke folder
__masuk ke database.php jika menggunakan mysql (ubah default dari pgsql -> mysql)
__nyalakan xampp
__ketikkan: "composer install" & "composer update"
__nyalakan apps, ketikkan: "php artisan serve"
__ketikan: "php artisan migrate"

SPESIAL FOR DEVELOP: masuk ke : http://localhost/seed (untuk membuat seeder lengkap)

## AKUN SEEDER
email: superadmin@gmail.com
password: superadmin
