<?php

namespace App\Http\Controllers;

use App\Exports\RekapExport;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RekapController extends Controller
{

        public function rekap()
        {
                $data['data'] = [
                        'pemasukan' => Pemasukan::all(),
                        'pengeluaran' => Pengeluaran::all()
                ];
                return Excel::download(new RekapExport($data['data']), 'rekap.xlsx');
        }

        public function index(Request $request)
        {
                if($request->tahun){
                        $tahun = $request->tahun;
                }else{
                        $tahun = Carbon::now()->year;
                }


                // ________________________Pemasukan_________________________________

                $pemasukan_jan = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '1')->sum('jumlah');

                $pemasukan_feb = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '2')->sum('jumlah');

                $pemasukan_mar = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '3')->sum('jumlah');

                $pemasukan_apr = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '4')->sum('jumlah');

                $pemasukan_mei = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '5')->sum('jumlah');

                $pemasukan_jun = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '6')->sum('jumlah');

                $pemasukan_jul = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '7')->sum('jumlah');

                $pemasukan_agt = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '8')->sum('jumlah');

                $pemasukan_sep = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '9')->sum('jumlah');

                $pemasukan_okt = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '10')->sum('jumlah');

                $pemasukan_nov = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '11')->sum('jumlah');

                $pemasukan_des = DB::table('pemasukan')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '12')->sum('jumlah');



                // _______________________Pengeluaran_________________________

                $pengeluaran_jan = DB::table('pengeluaran')
                ->whereYear('created_at', $tahun)
                ->whereMonth('created_at', '1')->sum('jumlah');

                $pengeluaran_feb = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '2')->sum('jumlah');

                $pengeluaran_mar = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '3')->sum('jumlah');

                $pengeluaran_apr = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '4')->sum('jumlah');

                $pengeluaran_mei = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '5')->sum('jumlah');

                $pengeluaran_jun = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '6')->sum('jumlah');

                $pengeluaran_jul = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '7')->sum('jumlah');

                $pengeluaran_agt = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '8')->sum('jumlah');

                $pengeluaran_sep = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '9')->sum('jumlah');

                $pengeluaran_okt = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '10')->sum('jumlah');

                $pengeluaran_nov = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '11')->sum('jumlah');

                $pengeluaran_des = DB::table('pengeluaran')
                        ->whereYear('created_at', $tahun)
                        ->whereMonth('created_at', '12')->sum('jumlah');


                // END:GET DATA (jumlah pemasukan & pengeluaran di tahun 2022/bulan)

                return view('pages.rekap')->with([
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
                'pengeluaran_nov' => $pengeluaran_nov, 'pengeluaran_des' => $pengeluaran_des,

                'tahun' => $tahun
                ]);
        }

        // public function seed()
        // {
        //         Artisan::call("migrate:refresh --seed");
        //         return redirect()->route("login");
        // }
}
