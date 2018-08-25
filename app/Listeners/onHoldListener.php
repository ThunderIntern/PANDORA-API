<?php

namespace App\Listeners;
use App\Events\onHoldEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use App\PesananHeader as ph;
use App\Wallet as w;
use App\Saldo as s;
use App\Status as status;
class onHoldListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  onHoldEvent  $event
     * @return void
     */
    public function handle(onHoldEvent $event)
    {
       
        $id=$event->id;

       $pesananHeader=ph::where('id',$id)->first();
       $id_user=$pesananHeader->id_user;
      
       $wallet=w::where('id_user',$id_user)->first();
       //get saldo
       $idw=$wallet->id;
       $saldo=s::where('id_wallet',$idw)->get();
      
   
        //cek status pesanan
       
       
       $status=status::where('id_pesanan_header',$id)->first();
      $cek=$status->status;
     
 
       if($cek=="Ordering" ) {
        $cekSaldo=$saldo->sum('jumlah');

     
        $hargaPesanan=$pesananHeader->total;

        if($cekSaldo>$hargaPesanan){
        $transaksi = new s();
        $transaksi->id_wallet=$idw;
        $transaksi->jumlah=(-$hargaPesanan);
        $transaksi->keterangan="";
        $dates=date('Y-m-d H:i:s');
        $transaksi->tanggal=$dates;
        $transaksi->onHold=true;
        $transaksi->save();
   
        }else{
            return false;
        }
        
      }else{
        return false;
      }

    }
}
