<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;

class SalesReportController extends Controller
{
    public function SalesReport(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $query = Transaction::with(['customer', 'sales.product'])
            ->when($month, fn($q) => $q->whereMonth('transaction_date', $month))
            ->when($year, fn($q) => $q->whereYear('transaction_date', $year))
            ->latest()
            ->get();

        return view('backend.report.sales_report', compact('query', 'month', 'year'));
    }

    public function ExportPDF(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $query = Transaction::with(['customer', 'sales.product'])
            ->when($month, fn($q) => $q->whereMonth('transaction_date', $month))
            ->when($year, fn($q) => $q->whereYear('transaction_date', $year))
            ->latest()
            ->get();

        $pdf = Pdf::loadView('backend.report.sales_report_pdf', compact('query', 'month', 'year'))
            ->setPaper('a4', 'landscape'); // Adjust paper size and orientation if needed

        return $pdf->download('sales_report.pdf');
    }
}
