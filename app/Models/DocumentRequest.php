<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_type_id',
        'purpose',
        'additional_info',
        'status',
        'reference_number',
        'request_date',
        'completion_date',
        'admin_notes',
        'document_file'
    ];

    protected $casts = [
        'request_date' => 'date',
        'completion_date' => 'date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function documentType() {
        return $this->belongsTo(DocumentType::class);
    }

    public function transaction() {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}