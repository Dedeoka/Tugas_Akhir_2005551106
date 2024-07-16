<?php

namespace App\Http\Controllers\Admin\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DonateGoods;
use App\Models\DonateGoodsDetail;
use App\Models\GoodsCategory;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DonateGoodsExport;
use App\Exports\DonateMoneyExport;
use App\Exports\ScholarshipExport;
use App\Models\DonateMoney;
use App\Models\Scholarship;

class ExportController extends Controller
{
    public function donateGood(Request $request){
        $filename = "Laporan Donasi Barang";
        $q = DonateGoods::with('donateGoodDetails.goodsCategory');

        $from = $request->query('startDate', '');
        if($from) {
            $q->where('date', '>=', $from);
            $filename .= '-'.$from;
        }
        $to = $request->query('endDate', '');
        if($to) {
            $q->where('date', '<=', $to);
            $filename .= '-'.$to;
        }

        $datas = $q->get();

        $totalQuantities = [];
        foreach ($datas as $data) {
            foreach ($data->donateGoodDetails as $detail) {
                if (!isset($totalQuantities[$detail->goodsCategory->name])) {
                    $totalQuantities[$detail->goodsCategory->name] = 0;
                }
                $totalQuantities[$detail->goodsCategory->name] += $detail->quantity;
            }
        }

        $exportData = [];
        foreach ($totalQuantities as $category => $quantity) {
            $exportData[] = [
                'Category' => $category,
                'Total_quantity' => $quantity
            ];
        }

        return Excel::download(new DonateGoodsExport($datas, $from, $to, $exportData), $filename . '.xlsx');
    }

    public function donateMoney(Request $request){
        $filename = "Laporan Donasi Uang";
        $q = DonateMoney::query();

        $from = $request->query('startDate', '');
        if($from) {
            $q->where('created_at', '>=', $from);
            $filename .= '-'.$from;
        }
        $to = $request->query('endDate','');
        if($to) {
            $q->where('created_at', '<=', $to);
            $filename .= '-'.$to;
        }

        $datas = $q->get();

        $totalAmountSuccess = $q->where('status', 'success')->sum('total_amount');

        return Excel::download(new DonateMoneyExport($datas, $from, $to, $totalAmountSuccess), $filename . '.xlsx');
    }

    public function scholarship(Request $request){
        $filename = "Laporan Donasi Beasiswa";
        $q = Scholarship::query();

        $from = $request->query('startDate', '');
        if($from) {
            $q->where('created_at', '>=', $from);
            $filename .= '-'.$from;
        }
        $to = $request->query('endDate','');
        if($to) {
            $q->where('created_at', '<=', $to);
            $filename .= '-'.$to;
        }

        $datas = $q->get();

        $totalAmountSuccess = $q->where('status', 'success')->sum('total_amount');

        return Excel::download(new ScholarshipExport($datas, $from, $to, $totalAmountSuccess), $filename . '.xlsx');

    }
}
