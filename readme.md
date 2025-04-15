Langkahnya:

`git clone https://github.com/absorkun/tugasakhir`

`cd tugasakhir`

`cp .env.example .env`

Abis itu copy midtrans API ke file .env pake notepad:

`notepad .env` ==> Setelah itu save ==> exit notepad

`composer install`

`npm install`

`php artisan migrate:fresh`

`php artisan db:seed`

`composer run dev`


Midtrans API diperlukan.

atau bisa sekaligus

`git clone https://github.com/absorkun/tugasakhir; cd tugasakhir; cp .env.example .env; notepad .env` ==> save ==> exit

`composer install; npm install; php artisan migrate:fresh; php artisan db:seed; composer run dev`


Selesai.

Cara Keluar/Membatalkan aplikasi:

Teken CTRL + C

Sisanya kalau mau jalankan appnya lagi tinggal:

`composer run dev`
