<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable=['name', 'purchase_date', 'status', 'total', 'tax', 'vendor_nip', 'vendor_name', 'vendor_adress', 'vendor_phone', 'invoice_number', 'payment', 'card_number'];
    public function client()
    {
       return $this->belongsTo(Client::class);

    }
}
