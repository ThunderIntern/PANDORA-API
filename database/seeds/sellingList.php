<?php

use Illuminate\Database\Seeder;
use App\SellingList as sl;
use App\Barang as b;
class sellingList extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       
        $sl = sl::create([
            'id_user' => 'a',
            'sku_barang' => 'qwe1',
             'harga' => 1500000,
           
            ]);

  
        
    }
}
