<?php

use Illuminate\Database\Seeder;
use App\PesananHeader as ph;
use App\Status as s;
use App\StatusPengiriman as rs;
use App\PesananDetail as pd;
use App\Pengiriman as p;
use App\Pricing as pr;
class pesanan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $ph = ph::create([
            
            'nomor' => '2018.0702.0004',
            'tanggal' => '2018-07-18 13:44:27',
            'total' => 900000,
            'ongkos_kirim' => 50000,
            ]);
        
        $s = s::create([
            'id_pesanan_header' => $ph->id,
            'tanggal' => '2018-07-18 13:44:27',
            'status' => 'shipping'
        ]);
        $pd = pd::create([
            'jumlah_barang' => 4,
            'sku' => 'qwe1',
            'harga' =>900000,
            'harga_promo' =>800000,
            'id_pesanan_header' =>$ph->id,
        ]);
        $p = p::create([
            'id_pesanan_header' => $ph->id,
            'nomor_resi' => '1j21jsasaf',
            'tanggal_pengiriman' => '2018-07-18 13:44:27',
            'alamat_pengirim' => 'jalan.jdfsapa',
            'alamat_penerima' => 'jalan.sdfsapa',
            'nama_pengirim' =>'aji',
            'nama_penerima' =>'hanafi',
            'no_telp_pengirim' => '08192312',
            'no_telp_penerima' => '082422312',
            'kodepos_penerima' => '20111',
            'kodepos_pengirim' => '081213',
            'jasa_ekspedisi' => 'JNE',
            'tipe_paket' => 'kilat',
            'longitude' => '102utc-sadw',
            'latitude' => '12k2-32kd',

        ]);
     
        $rs = rs::create([
            
            'id_pengiriman' => $p->id,
            'status' => 'shipping',
            'lokasi' => 'jawa timur,malang',
            'tanggal' => '2018-07-18 13:44:27',
            ]);
    }
}
