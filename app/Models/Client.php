<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['name', 'street', 'zip_code','city' ,'scan_check'];
    use HasFactory;
    public function invoices()
    {
       return $this->belongsToMany(Invoice::class,'clients_invoices', 'client_id', 'invoice_id');

    }

}
