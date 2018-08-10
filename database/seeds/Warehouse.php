<?php

use Illuminate\Database\Seeder;
use App\Gudang as g;
use App\StokHeader as sh;
use App\StokDetail as sd;
use App\Barang as b;
use App\Image as i;
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
    }
}
