<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category',
        'description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    /**
     * Get the stock status of the product
     * 
     * @return string
     */
    public function getStockStatus()
    {
        if ($this->quantity == 0) {
            return 'out-of-stock';
        } elseif ($this->quantity < 10) {
            return 'low-stock';
        } else {
            return 'in-stock';
        }
    }

    /**
     * Check if product is in stock
     * 
     * @return bool
     */
    public function isInStock()
    {
        return $this->quantity > 0;
    }

    /**
     * Check if product has low stock
     * 
     * @return bool
     */
    public function isLowStock()
    {
        return $this->quantity > 0 && $this->quantity < 10;
    }

    /**
     * Check if product is out of stock
     * 
     * @return bool
     */
    public function isOutOfStock()
    {
        return $this->quantity == 0;
    }

    /**
     * Scope a query to filter by name
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    /**
     * Scope a query to filter by category
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope a query to get in-stock products
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInStock($query)
    {
        return $query->where('quantity', '>', 0);
    }

    /**
     * Scope a query to get low-stock products
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLowStock($query)
    {
        return $query->whereBetween('quantity', [1, 9]);
    }

    /**
     * Scope a query to get out-of-stock products
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOutOfStock($query)
    {
        return $query->where('quantity', 0);
    }
}
