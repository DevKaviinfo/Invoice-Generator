<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function create() {
 
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();

        $loadinvoices = Invoice::pluck('invoice_number')->toArray();

        do {
            $invoiceNumber = 'INV-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        } while (in_array($invoiceNumber, $loadinvoices));


        return view('invoices.create',['invoiceNumber' => $invoiceNumber,'date'=>$date,'time'=>$time]);
    }

    public function store(Request $request)
    {


        
        $invoice = Invoice::create([
            
            'company_name'=>$request->company_name,
            'company_number'=>$request->company_number,
            'company_mail'=>$request->company_mail,
            'company_adress'=>$request->company_adress,
            'invoice_number'=>$request->invoice_number,
            'invoice_date'=>$request->invoice_date,
            'invoice_time'=>$request->invoice_time,
            'currency'=>$request->currency,
            'tax'=>$request->tax,
            'client_name' => $request->client_name,
            'client_number'=>$request->client_number,
            'client_mail' => $request->client_mail,
            'client_adress'=>$request->client_adress,
            'total_amount' => collect($request->items)->sum(function ($item) {
                return $item['quantity'] * $item['price'];
            }),
            'notes'=>$request->notes,
        ]);

        foreach ($request->items as $item) {
            $invoice->items()->create($item);
        }

        return redirect("/invoices/{$invoice->id}/pdf");
    }

    public function downloadPDF($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('invoices.pdf', compact('invoice'));
        return $pdf->download($invoice->invoice_number . '.pdf');
    }

}
