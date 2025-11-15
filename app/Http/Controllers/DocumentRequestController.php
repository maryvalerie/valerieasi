<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\DocumentType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentRequestController extends Controller
{
    public function index() {
        $requests = DocumentRequest::with(['documentType', 'user'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('documents.index', compact('requests'));
    }

    public function create() {
        $documentTypes = DocumentType::where('is_active', true)->get();
        return view('documents.create', compact('documentTypes'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'purpose' => 'required|string|max:500',
            'additional_info' => 'nullable|string'
        ]);

        $documentType = DocumentType::find($validated['document_type_id']);

        $documentRequest = DocumentRequest::create([
            'user_id' => Auth::id(),
            'document_type_id' => $validated['document_type_id'],
            'purpose' => $validated['purpose'],
            'additional_info' => $validated['additional_info'],
            'reference_number' => 'DOC-' . Str::random(8) . '-' . time(),
            'request_date' => now(),
            'status' => 'pending'
        ]);

        // Create transaction record
        if ($documentType->fee > 0) {
            Transaction::create([
                'user_id' => Auth::id(),
                'transactionable_type' => DocumentRequest::class,
                'transactionable_id' => $documentRequest->id,
                'amount' => $documentType->fee,
                'payment_status' => 'pending',
                'reference_number' => 'TXN-' . Str::random(8) . '-' . time()
            ]);
        }

        return redirect()->route('documents.index')
            ->with('success', 'Document request submitted successfully! Reference #: ' . $documentRequest->reference_number);
    }

    public function show(DocumentRequest $documentRequest) {
        if ($documentRequest->user_id !== Auth::id() && Auth::user()->user_type === 'resident') {
            abort(403);
        }

        return view('documents.show', compact('documentRequest'));
    }
}