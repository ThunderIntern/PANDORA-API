<?php

use Illuminate\Database\Seeder;
use App\Pricing as p;
use App\ExportRequest as er;
class pricing extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        $p = p::create([
            
            'sku_barang' => 'qwe1',
            'tanggal' => '2018-07-18 13:44:27',
            'harga' => 900000,
            'harga_promo' => 800000,
            ]);

            $er = er::create([
            
                'id_user' => 'a',
                'target'=>'bukalapak'
                ]);
    
        
    }
}
