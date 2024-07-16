<?php

namespace App\Exports;

use App\Models\DonateGoods;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class DonateGoodsExport implements FromView
{
    protected $datas;
    protected $from;
    protected $to;
    protected $exportData;

    public function __construct($datas, $from, $to, $exportData)
    {
        $this->datas = $datas;
        $this->from = $from;
        $this->to = $to;
        $this->exportData = $exportData;
    }

    public function view(): View
    {
        return view('admin/export/donasi-barang', [
            'datas' => $this->datas,
            'from' => $this->from,
            'to' => $this->to,
            'exportData' => $this->exportData,
        ]);
    }
}

