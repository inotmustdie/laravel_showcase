<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'category',
        'date'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'date'
    ];

    public const CATEGORIES = [
        'food' => 'Еда',
        'transport' => 'Транспорт',
        'entertainment' => 'Развлечения',
        'bills' => 'Счета',
        'health' => 'Здоровье',
        'other' => 'Другое'
    ];

    public function getCategoryNameAttribute(): string
    {
        return self::CATEGORIES[$this->category] ?? 'Другое';
    }
}
