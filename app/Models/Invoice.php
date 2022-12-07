<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    use HasFactory;
    protected $fillable=['name', 'status', 'file_name', 'invoice_date', 'success_date','payee_name', "payee_tax_nr" , "payee_country", "payer_name","payer_tax_nr",  "payer_country", 'due_date', 'issue_date','purchase_date', "rate", 'gross', 'net', 'vat', 'currency', 'account_nr', 'invoice_nr','is_optima', 'is_filed','ative' , 'verified_with', 'is_recieved' ];
    public function client()
    {
       return $this->belongsTo(Client::class);

    }
    public function scopeRecived($query){
       return  $query->where('is_recieved', true);
    }
    public function scopeIssued($query){
        return  $query->where('is_recieved', false);
    }
}
