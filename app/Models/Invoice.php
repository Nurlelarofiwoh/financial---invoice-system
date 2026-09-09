<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'customer_name',
        'customer_email',
        'issue_date',
        'due_date',
        'notes',
        'total_amount',
        'payment_status',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'total_amount' => 'float',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function getTotalItemsCountAttribute()
    {
        return $this->items()->count();
    }

    public function getTotalQuantitySumAttribute()
    {
        return $this->items()->sum('quantity');
    }

    public static function generateInvoiceNumber($issueDate = null)
    {
        $date = $issueDate ? \Carbon\Carbon::parse($issueDate) : \Carbon\Carbon::now();
        $prefix = 'INV-' . $date->format('Ym') . '-';

        $latestInvoice = self::where('invoice_number', 'LIKE', $prefix . '%')
            ->orderBy('id', 'desc')
            ->first();

        if ($latestInvoice) {
            $lastNum = (int) substr($latestInvoice->invoice_number, -3);
            $nextNum = str_pad($lastNum + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNum = '001';
        }

        return $prefix . $nextNum;
    }
}
