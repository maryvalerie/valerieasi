<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypesSeeder extends Seeder
{
    public function run()
    {
        $documentTypes = [
            [
                'name' => 'Barangay Clearance',
                'description' => 'Certificate of residency and good moral character',
                'fee' => 50.00,
                'processing_days' => 2,
                'requirements' => 'Valid ID, Proof of Residency'
            ],
            [
                'name' => 'Business Permit',
                'description' => 'Permission to operate business within barangay',
                'fee' => 500.00,
                'processing_days' => 5,
                'requirements' => 'Business Plan, Valid ID, Proof of Business Location'
            ],
            [
                'name' => 'Indigency Certificate',
                'description' => 'Certification for availing government assistance',
                'fee' => 25.00,
                'processing_days' => 1,
                'requirements' => 'Valid ID, Proof of Income'
            ],
            [
                'name' => 'Residency Certificate',
                'description' => 'Proof of residence in the barangay',
                'fee' => 30.00,
                'processing_days' => 1,
                'requirements' => 'Valid ID, Proof of Residency'
            ],
            [
                'name' => 'Barangay ID',
                'description' => 'Identification card issued by barangay',
                'fee' => 100.00,
                'processing_days' => 3,
                'requirements' => 'Birth Certificate, Valid ID, 2x2 Photo'
            ]
        ];

        foreach ($documentTypes as $type) {
            DocumentType::create($type);
        }
    }
}