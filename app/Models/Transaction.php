<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transactionable_type',
        'transactionable_id',
        'amount',
        'payment_status',
        'payment_method',
        'reference_number',
        'payment_date',
        'payment_details'
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactionable() {
        return $this->morphTo();
    }
}