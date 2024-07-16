<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DonateGoods;
use App\Models\DonateGoodsDetail;
use App\Models\GoodsCategory;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DonateGoodsExport;


class TestController extends Controller
{
    public function index(Request $request){
        $filename = "Laporan Donasi Barang";
        $q = DonateGoods::with('donateGoodDetails.goodsCategory');

        $from = $request->query('startDate', '');
        if($from) {
            $q->where('date', '>=', $from);
            $filename .= '-'.$from;
        }
        $to = $request->query('endDate','');
        if($to) {
            $q->where('date', '<=', $to);
            $filename .= '-'.$to;
        }

        $to = $request->query('endDate', '');

        $datas = $q->get();

        return Excel::download(new DonateGoodsExport($datas, $from, $to), $filename . '.xlsx');

    }
}
