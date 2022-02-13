<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table ="bill_detail";

    public function product(){
        $this->belongsTo('App\Models\Product','id_product','id');
    }

    public function bill(){
        $this->belongsTo('App\Models\Bill','id_bill','id');
    }
}
