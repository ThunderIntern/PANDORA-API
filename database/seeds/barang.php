<?php

use Illuminate\Database\Seeder;

use App\Kategori as k;
use App\KategoriBarang as kb;
class barang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          $fashion=k::create([
                'jenis' => 'kategori',
                'nama' => 'Gadget dan Accessories',
              
                ]);
                $Kemeja=k::create([
                    'jenis' => 'tag',
                    'nama' => 'Handphone',
                    'id_parent'=>$fashion->id ,
                    ]);
                  $Casual=k::create([
                    'jenis' => 'tag',
                    'nama' => 'Powerbank',
                    'id_parent'=>$fashion->id ,
                    ]);
                    $Jeans=k::create([
                        'jenis' => 'tag',
                        'nama' => 'Headset',
                        'id_parent'=>$fashion->id ,
                        ]);
                        $Warna=k::create([
                            'jenis' => 'tag',
                            'nama' => 'Warna',
                          
                            ]); 

                            $Biru=k::create([
                                'jenis' => 'tag',
                                'nama' => 'Hijau',
                                'id_parent'=>$Warna->id ,
                                ]); 
                                $Abu=k::create([
                                    'jenis' => 'tag',
                                    'nama' => 'Putih',
                                    'id_parent'=>$Warna->id ,
                                    ]);
                                    $Hitam=k::create([
                                        'jenis' => 'tag',
                                        'nama' => 'Kuning',
                                        'id_parent'=>$Warna->id ,
                                        ]);     
    }
}
