<?php


namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\FeeManager;

class FeeViewExport implements FromView
{
    public function view(): View
    {
        return view('admin.export_tables.fee', [
            'feelist' => FeeManager::all()
        ]);
    }
}
