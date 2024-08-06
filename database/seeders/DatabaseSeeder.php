<?php

namespace Database\Seeders;

use App\Models\ProductModel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('rioputra1210'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Customer',
            'email' => 'customer@mail.com',
            'password' => bcrypt('rioputra1210'),
            'role' => 'customer',
        ]);
        ProductModel::create([
            "id" => 1,
            "slug" => "dd13c144-f974-4812-a080-97369754c93a",
            "product_name"=>"High Heels",
            "status"=>"active",
            "product_category"=>"Fashion",
            "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
            "product_img"=>"product-img/LX2WIlOIL4hgHWAwOwZWjARnQ0PrgvcpwTJeDhur.jpg",
            "product_quantity"=>1,
            "product_price"=>100000,
        ]);
        ProductModel::create([
            "id" => 2,
            "slug" => "52d2e89d-5a08-4481-b4fd-9c78e338a7ab",
            "product_name"=>"Beach Bundle",
            "status"=>"active",
            "product_category"=>"Fashion",
            "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
            "product_img"=>"product-img/YiINdP3SvXeCXD682V4xALJd67s0OL3304fV7bc6.webp",
            "product_quantity"=>2,
            "product_price"=>190000,
        ]);
        // ProductModel::create([
        //     "id" => 3,
        //     "slug" => "1d13c144-f974-4812-a080-97369754c93a",
        //     "product_name"=>"High Heels",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/LX2WIlOIL4hgHWAwOwZWjARnQ0PrgvcpwTJeDhur.jpg",
        //     "product_quantity"=>1,
        //     "product_price"=>100000,
        // ]);
        // ProductModel::create([
        //     "id" => 4,
        //     "slug" => "12d2e89d-5a08-4481-b4fd-9c78e338a7ab",
        //     "product_name"=>"Beach Bundle",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/YiINdP3SvXeCXD682V4xALJd67s0OL3304fV7bc6.webp",
        //     "product_quantity"=>2,
        //     "product_price"=>190000,
        // ]);
        // ProductModel::create([
        //     "id" => 5,
        //     "slug" => "5d13c144-f974-4812-a080-97369754c93a",
        //     "product_name"=>"High Heels",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/LX2WIlOIL4hgHWAwOwZWjARnQ0PrgvcpwTJeDhur.jpg",
        //     "product_quantity"=>1,
        //     "product_price"=>100000,
        // ]);
        // ProductModel::create([
        //     "id" => 6,
        //     "slug" => "62d2e89d-5a08-4481-b4fd-9c78e338a7ab",
        //     "product_name"=>"Beach Bundle",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/YiINdP3SvXeCXD682V4xALJd67s0OL3304fV7bc6.webp",
        //     "product_quantity"=>2,
        //     "product_price"=>190000,
        // ]);
        // ProductModel::create([
        //     "id" => 7,
        //     "slug" => "7d13c144-f974-4812-a080-97369754c93a",
        //     "product_name"=>"High Heels",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/LX2WIlOIL4hgHWAwOwZWjARnQ0PrgvcpwTJeDhur.jpg",
        //     "product_quantity"=>1,
        //     "product_price"=>100000,
        // ]);
        // ProductModel::create([
        //     "id" => 8,
        //     "slug" => "82d2e89d-5a08-4481-b4fd-9c78e338a7ab",
        //     "product_name"=>"Beach Bundle",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/YiINdP3SvXeCXD682V4xALJd67s0OL3304fV7bc6.webp",
        //     "product_quantity"=>2,
        //     "product_price"=>190000,
        // ]);

        // ProductModel::create([
        //     "id" => 9,
        //     "slug" => "9d13c144-f974-4812-a080-97369754c93a",
        //     "product_name"=>"High Heels",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/LX2WIlOIL4hgHWAwOwZWjARnQ0PrgvcpwTJeDhur.jpg",
        //     "product_quantity"=>1,
        //     "product_price"=>100000,
        // ]);
        // ProductModel::create([
        //     "id" => 10,
        //     "slug" => "10d2e89d-5a08-4481-b4fd-9c78e338a7ab",
        //     "product_name"=>"Beach Bundle",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/YiINdP3SvXeCXD682V4xALJd67s0OL3304fV7bc6.webp",
        //     "product_quantity"=>2,
        //     "product_price"=>190000,
        // ]);
        // ProductModel::create([
        //     "id" => 11,
        //     "slug" => "1113c144-f974-4812-a080-97369754c93a",
        //     "product_name"=>"High Heels",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/LX2WIlOIL4hgHWAwOwZWjARnQ0PrgvcpwTJeDhur.jpg",
        //     "product_quantity"=>1,
        //     "product_price"=>100000,
        // ]);
        // ProductModel::create([
        //     "id" => 12,
        //     "slug" => "1222e89d-5a08-4481-b4fd-9c78e338a7ab",
        //     "product_name"=>"Beach Bundle",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/YiINdP3SvXeCXD682V4xALJd67s0OL3304fV7bc6.webp",
        //     "product_quantity"=>2,
        //     "product_price"=>190000,
        // ]);
        // ProductModel::create([
        //     "id" => 13,
        //     "slug" => "1313c144-f974-4812-a080-97369754c93a",
        //     "product_name"=>"High Heels",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/LX2WIlOIL4hgHWAwOwZWjARnQ0PrgvcpwTJeDhur.jpg",
        //     "product_quantity"=>1,
        //     "product_price"=>100000,
        // ]);
        // ProductModel::create([
        //     "id" => 14,
        //     "slug" => "14d2e89d-5a08-4481-b4fd-9c78e338a7ab",
        //     "product_name"=>"Beach Bundle",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/YiINdP3SvXeCXD682V4xALJd67s0OL3304fV7bc6.webp",
        //     "product_quantity"=>2,
        //     "product_price"=>190000,
        // ]);
        // ProductModel::create([
        //     "id" => 15,
        //     "slug" => "1513c144-f974-4812-a080-97369754c93a",
        //     "product_name"=>"High Heels",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/LX2WIlOIL4hgHWAwOwZWjARnQ0PrgvcpwTJeDhur.jpg",
        //     "product_quantity"=>1,
        //     "product_price"=>100000,
        // ]);
        // ProductModel::create([
        //     "id" => 16,
        //     "slug" => "16d2e89d-5a08-4481-b4fd-9c78e338a7ab",
        //     "product_name"=>"Beach Bundle",
        //     "status"=>"active",
        //     "product_category"=>"Fashion",
        //     "product_description"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis labore unde dolor quam, fugiat, porro odit perferendis obcaecati est cum dolores at nihil, facere neque. Culpa id nulla ipsum recusandae",
        //     "product_img"=>"product-img/YiINdP3SvXeCXD682V4xALJd67s0OL3304fV7bc6.webp",
        //     "product_quantity"=>2,
        //     "product_price"=>190000,
        // ]);
    }
}
