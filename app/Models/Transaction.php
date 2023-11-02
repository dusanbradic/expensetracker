<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'category', 'is_income'];

    public function scopeInDateRange($query, $start_date, $end_date)
    {
        return $query->whereDate('created_at', '>=', $start_date)
                     ->whereDate('created_at', '<=', $end_date);
    }

    public function scopeIsIncome($query)
    {
        return $query->where('is_income', 1);
    }

    public function scopeIsExpense($query)
    {
        return $query->where('is_income', 0);
    }
}
