<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table ="bills";

    public function bill_detail(){
        $this->hasMany('App\Models\BillDeltai','id_bill','id');
    }

    public function customer(){
        $this->belongsTo('App\Models\Customer','id_customer','id');
    }
}
