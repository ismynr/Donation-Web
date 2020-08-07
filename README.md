>   Donation Web Application <br>
<br>

## Deskripsi Sistem
### Role dan Peran Masing2
1.  Admin 
    -   Management Pengurus user account
    -   Management Donatur user account
    -   Activity log all role
    -   Profile, change pwd
2.  Pengurus
    -   Management Penerima
    -   Management Donatur without user account
    -   Management Donasi
    -   Management Kategori Donasi
    -   Dukungan Layanan for Donatur
    -   Profile, change pwd
3.  Donatur
    -   Donasi Donatur
    -   Dukungan Layanan from Pengurus
    -   Profile, change pwd
<br>

### Login
-   Admin
    -   Email: admin@gmail.com
    -   Password: admin
-   Pengurus
    -   Email: pengurus@gmail.com
    -   Password: pengurus
-   Donatur
    -   Email: **liat database users sesuai role**
    -   Password: **sama sesuai email**
<br>

# Cara Install
## Clone Dari Github
-   Open terminal / git bash
-   git clone [url_github]
-   cd [nama_repo]
-   composer install
-   cp .env.example .env
-   setting database and email konfigurasi di .env
-   php artisan key:generate
-   php artisan migrate:fresh --seed
-   php artisan storage:link
<br>