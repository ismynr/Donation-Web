>   Smart Risk Management For Receiving Web-Based Assistance 
>   Kelas B, Group 2

## Kelompok
-   Khibar Pusaka
-   Reza Zulfan Azmi
-   Andi Purwanto
-   Ismi Nururrizqi (17090042)

## Pitur HUHU
-   CRUD [Uwis]


# Cara Install

## Clone Dari Github
-   Masuk terminal / git bash
-   git clone [url_github]
-   cd [nama_repo]
-   composer install
-   cp .env.example .env
-   php artisan key:generate
-   php artisan migrate
-   composer dump-autoload
-   php artisan db:seed --class=CategorySeeder
-   php artisan db:seed --class=PenerimaSeeder
-   php artisan db:seed --class=DonaturSeeder
-   php artisan db:seed --class=PengurusSeeder
-   php artisan db:seed --class=UserSeeder
-   php artisan db:seed --class=DonasiSeeder

## Perbaharui Repo Lokal Dr Remote
-   git Pull [nama_remote] [nama_branch]
