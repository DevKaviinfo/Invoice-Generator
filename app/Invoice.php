<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'currency',
        'tax',
        'company_name',
        'company_number',
        'company_mail',
        'company_adress',
        'client_name',
        'client_number',
        'client_mail',
        'client_adress',
        'invoice_number',
        'invoice_date',
        'invoice_time',
        'total_amount',
        'notes'
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
