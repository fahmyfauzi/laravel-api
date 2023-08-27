# Laravel API (Aplicatioin Programming Interface)
Hasil Belajar membuat API dari youtube [@rumahrafif](https://www.youtube.com/watch?v=tv7tqf3AC7Y)

## features
- API CRUD
- Interface CRUD


## requirements
- php 8.1
- database mysql
- laravel 10.0
- laragon
- chrome
- composer
- Postman

## installation

1. Clone repositori
    ```sh
    git https://github.com/fahmyfauzi/laravel-api.git
    ```
2. masuk ke dalam directori
    ```sh
    cd laravel-api
    ```
3. Instal composer
    ```sh
    composer install
    or
    composer update
    ```
4. Copy file .env.example 
    ```
    cp .env.example .env
    ```
4. Generate an app encryption key

    ```sh
    php artisan key:generate
    ```
5. Create database on your computer or phpMyAdmin and import data from 
6. In the .env file, add database information to allow Laravel to connect to the database
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_didamelid
    DB_USERNAME=DB_USERNAME
    DB_PASSWORD=DB_PASSWORD
    ```
    
6. migrasi database
    ```
    php artisan migrate
    ```
    
7. run project 2 terminal
    ```sh
   php artisan serve
   and
   php artisan serve --port=9000
    ```


## usage
- buka chrome  dan akses ``` http://127.0.0.1:9000/buku``` untuk melihat daftar buku serta melakukan CRUD
- akses dari software postman ```http://127.0.0.1:8000/api/buku```  lalu pilih metode GET, untuk melihat api daftar buku
- akses dari software postman ```http://127.0.0.1:8000/api/buku/{id}``` misal ``` http://127.0.0.1:8000/api/buku/26 ``` lalu pilih metode GET, untuk melihat api detail buku
- akses dari software postman ```http://127.0.0.1:8000/api/buku/{id}``` misal ``` http://127.0.0.1:8000/api/buku/26 ``` lalu pilih metode PUT masuk ke Body lalu pilih x-wwww-form-urlencoded dan masukan key value yang mau diubah datanya
- akses dari software postman ```http://127.0.0.1:8000/api/buku/{id}``` misal ``` http://127.0.0.1:8000/api/buku/26 ``` lalu pilih metode DELETE, untuk menghapus data.


## credits

[Fahmy Fauzi ](https://github.com/fahmyfauzi)

## screanshot
1. Menambahkan buku dan melihat semua buku
   ![Untitled video - Made with Clipchamp (11)](https://github.com/fahmyfauzi/laravel-api/assets/58255031/95c03025-8bee-40bc-b8da-a6ea96d428c8)

2. Menampilkan detail buku by id
   ![Untitled video - Made with Clipchamp (12)](https://github.com/fahmyfauzi/laravel-api/assets/58255031/e16761dd-9c8f-4e81-b168-475021046d21)

3. Mengubah judul buku
   ![Untitled video - Made with Clipchamp (13)](https://github.com/fahmyfauzi/laravel-api/assets/58255031/7c844145-15d5-4deb-82ac-ee460c4455c9)

5. Menghapus buku
   ![Untitled video - Made with Clipchamp (14)](https://github.com/fahmyfauzi/laravel-api/assets/58255031/a78d5a5a-0279-4c5e-8ed9-2db3d6d75753)

