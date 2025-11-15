<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'fee',
        'processing_days',
        'requirements',
        'is_active'
    ];

    public function documentRequests() {
        return $this->hasMany(DocumentRequest::class);
    }
}