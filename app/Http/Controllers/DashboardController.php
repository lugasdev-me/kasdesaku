<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::orderBy('updated_at', 'desc')->paginate(10);
        $pengeluaran = Pengeluaran::orderBy('updated_at', 'desc')->paginate(10);

        // START:GET DATA (jumlah pemasukan & pengeluaran di tahun 2022/bulan)

        // ________________________Pemasukan_________________________________

        $pemasukan_jan = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '1')->sum('jumlah');

        $pemasukan_feb = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '2')->sum('jumlah');

        $pemasukan_mar = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '3')->sum('jumlah');
        
        $pemasukan_apr = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '4')->sum('jumlah');

        $pemasukan_mei = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '5')->sum('jumlah');

        $pemasukan_jun = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '6')->sum('jumlah');

        $pemasukan_jul = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '7')->sum('jumlah');

        $pemasukan_agt = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '8')->sum('jumlah');
        
        $pemasukan_sep = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '9')->sum('jumlah');

        $pemasukan_okt = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '10')->sum('jumlah');

        $pemasukan_nov = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '11')->sum('jumlah');

        $pemasukan_des = DB::table('pemasukan')
                    ->whereYear('created_at', '2022')
                    ->whereMonth('created_at', '12')->sum('jumlah');

        

        // _______________________Pengeluaran_________________________

        $pengeluaran_jan = DB::table('pengeluaran')
        ->whereYear('created_at', '2022')
        ->whereMonth('created_at', '1')->sum('jumlah');

        $pengeluaran_feb = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '2')->sum('jumlah');

        $pengeluaran_mar = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '3')->sum('jumlah');

        $pengeluaran_apr = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '4')->sum('jumlah');

        $pengeluaran_mei = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '5')->sum('jumlah');

        $pengeluaran_jun = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '6')->sum('jumlah');

        $pengeluaran_jul = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '7')->sum('jumlah');

        $pengeluaran_agt = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '8')->sum('jumlah');

        $pengeluaran_sep = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '9')->sum('jumlah');

        $pengeluaran_okt = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '10')->sum('jumlah');

        $pengeluaran_nov = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '11')->sum('jumlah');

        $pengeluaran_des = DB::table('pengeluaran')
                ->whereYear('created_at', '2022')
                ->whereMonth('created_at', '12')->sum('jumlah');


        // END:GET DATA (jumlah pemasukan & pengeluaran di tahun 2022/bulan)

        $jumlah_pemasukan = Pemasukan::sum('jumlah');
        $pemasukan_terbesar = Pemasukan::max('jumlah');

        $jumlah_pengeluaran = Pengeluaran::sum('jumlah');
        $pengeluaran_terbesar = Pengeluaran::max('jumlah');

        $saldo = $jumlah_pemasukan - $jumlah_pengeluaran;

        return view('pages.dashboard')->with([
            'jumlah_pemasukan' => $jumlah_pemasukan,
            'pemasukan_terbesar' => $pemasukan_terbesar,
            'jumlah_pengeluaran' => $jumlah_pengeluaran,
            'pengeluaran_terbesar' => $pengeluaran_terbesar,
            'saldo' => $saldo,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,

            'pemasukan_jan' => $pemasukan_jan, 'pemasukan_feb' => $pemasukan_feb, 
            'pemasukan_mar' => $pemasukan_mar, 'pemasukan_apr' => $pemasukan_apr, 
            'pemasukan_mei' => $pemasukan_mei, 'pemasukan_jun' => $pemasukan_jun, 
            'pemasukan_jul' => $pemasukan_jul, 'pemasukan_agt' => $pemasukan_agt,
            'pemasukan_sep' => $pemasukan_sep, 'pemasukan_okt' => $pemasukan_okt, 
            'pemasukan_nov' => $pemasukan_nov, 'pemasukan_des' => $pemasukan_des,

            'pengeluaran_jan' => $pengeluaran_jan, 'pengeluaran_feb' => $pengeluaran_feb, 
            'pengeluaran_mar' => $pengeluaran_mar, 'pengeluaran_apr' => $pengeluaran_apr, 
            'pengeluaran_mei' => $pengeluaran_mei, 'pengeluaran_jun' => $pengeluaran_jun, 
            'pengeluaran_jul' => $pengeluaran_jul, 'pengeluaran_agt' => $pengeluaran_agt,
            'pengeluaran_sep' => $pengeluaran_sep, 'pengeluaran_okt' => $pengeluaran_okt, 
            'pengeluaran_nov' => $pengeluaran_nov, 'pengeluaran_des' => $pengeluaran_des
        ]);
    }
}
