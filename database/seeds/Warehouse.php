<?php

use Illuminate\Database\Seeder;
use App\Gudang as g;
use App\StokHeader as sh;
use App\StokDetail as sd;
use App\Barang as b;
use App\Image as i;
use App\Pricing as p;
use App\Kategori as k;
use App\KategoriBarang as kb;
class Warehouse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g = g::create([
            'nama' => 'a',
            'alamat' => '{ "alamat": "jalan.sddasdsa","kelurahan":"" ,"kecamatan":"","kota":"malang","kodepos": "29132","provinsi":"jawa timur","negara":"indonesia" ,"geolocation": { "latitude":"" , "longitude": "" }}',
            ]);

        $sh = sh::create([
            'id_gudang' => $g->id,
            'tanggal' => '2018-07-18 13:44:27',
            'nomor' => '121313141dsa',
            'jenis' => 'barang datang'
        ]);
        $b = b::create([
            'nama' => 'sepatu',
            'sku' => 'qwe1',
            'berat'=>3000,
            'dimensi'=>'{ "panjang": "20", "lebar": "25","tinggi":"10" }',
            'deskripsi' => 'adidas mantap',
        ]);
        $dates=date('Y-m-d H:i:s');
        $p = p::create([
            'sku_barang' => $b->sku,
            'harga'=>rand(100000,500000),
            'harga_promo'=>rand(100000,400000),
            
            'tanggal'=>$dates,
            
            ]);
            $k = k::create([
                'kategori' => 'pakaian',
               
                
                ]);
            $kb= kb::create([
                
                'id_barang'=>$b->id,
                'id_kategori'=>$k->id,
            ]);
        $sd = sd::create([
            'id_stok_header' => $sh->id,
            'id_barang' => $b->id,
            'kuantitas' => 20,
            'satuan' => 'kg',
        ]);
     
        $i = i::create([
            
            'id_barang' => $b->id,
            'thumbnail' => 'samfoa.jpg',
            'image_ori' => 'afka.jpeg',
            ]);
            // $b = b::create([
            //     'nama' => str_random(10),
            //     'sku' => str_random(3),
            //     'berat'=>rand(1000,5000),
            //     'dimensi'=>'{ "panjang":"21", "lebar": "12","tinggi":"25" }',
            //     'deskripsi' =>  str_random(10),
            // ]);
            // $dates=date('Y-m-d H:i:s');
            // $p = p::create([
            //     'sku_barang' => $b->sku,
            //     'harga'=>rand(100000,500000),
            //     'harga_promo'=>rand(100000,400000),
                
            //     'tanggal'=>$dates,
                
            //     ]);
            
    }
}
