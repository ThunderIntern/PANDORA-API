<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        // $this->call('pesanan');
        // $this->call('pricing');
        // $this->call('sellingList');
        // $this->call('wallet');
        $this->call('Warehouse');
        // $this->call('barang');
        // factory(App\Barang::class, 50)->create()->make();
        // $this->call('barang',50);
    }
}
