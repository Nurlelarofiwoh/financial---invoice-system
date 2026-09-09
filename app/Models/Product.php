<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'name',
        'category',
        'unit_price',
        'stock_quantity',
        'status',
    ];

    protected $casts = [
        'unit_price' => 'float',
        'stock_quantity' => 'integer',
    ];

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
