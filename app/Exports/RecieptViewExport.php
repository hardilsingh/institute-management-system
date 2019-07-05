<?php


namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Reciept;

class RecieptViewExport implements FromView
{
    public function view(): View
    {
        return view('admin.export_tables.reciept', [
            'list' => Reciept::all()
        ]);
    }
}
