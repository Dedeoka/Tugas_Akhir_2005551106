<?php

namespace App\Exports;

use App\Models\DonateMoney;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class DonateMoneyExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $datas;
    protected $from;
    protected $to;
    protected $totalAmountSuccess;

    public function __construct($datas, $from, $to, $totalAmountSuccess)
    {
        $this->datas = $datas;
        $this->from = $from;
        $this->to= $to;
        $this->totalAmountSuccess = $totalAmountSuccess;
    }

    public function view(): View
    {
        return view('admin/export/donasi-uang', [
            'datas' => $this->datas,
            'from' => $this->from,
            'to' => $this->to,
            'totalAmountSuccess' => $this->totalAmountSuccess,
        ]);
    }
}
