<?php

use Illuminate\Database\Seeder;
use App\Wallet as w;
use App\Saldo as s;
class wallet extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $w = w::create([
            'id_user' => 'a',
            'nomer_rekening' => '12314123',
            ]);

        $s = s::create([
            'id_wallet' => $w->id,
            'tanggal' => '2018-07-18 13:44:27',
            'jumlah' => 5000000,
            'onHold'=>false,
            'keterangan' => 'tambah saldo'
        ]);
        
    }
}
