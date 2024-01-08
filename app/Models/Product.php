<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'sku', 'description', 'product_purchase_rate', 'tax_id', 'unit_id', 'hsn_code', 'type', 'image',
    ];
    // for product_id in stocks table
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'product_id');
    }

    // for tax_id and unit_id in products table
    public function tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    // for product_id in purchases table
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'product_id');
    }
}
