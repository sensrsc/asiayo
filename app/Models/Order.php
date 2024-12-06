<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
 
class Order extends Model
{
    protected $table = null;

    public function setTable($currency)
    {
        $this->table = 'orders_' . Str::lower($currency);
    }
}