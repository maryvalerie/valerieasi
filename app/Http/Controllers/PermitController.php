<?php

namespace App\Http\Controllers;

use App\Models\Permit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PermitController extends Controller
{
    public function index() {
        $permits = Permit::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('permits.index', compact('permits'));
    }

    public function create() {
        return view('permits.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'permit_type' => 'required|string|max:255',
            'business_name' => 'required_if:permit_type,business|nullable|string|max:255',
            'business_address' => 'required_if:permit_type,business|nullable|string',
            'purpose' => 'required|string|max:500',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'requirements_submitted' => 'required|string'
        ]);

        $fee = $this->calculateFee($validated['permit_type']);

        $permit = Permit::create([
            'user_id' => Auth::id(),
            'permit_type' => $validated['permit_type'],
            'business_name' => $validated['business_name'] ?? null,
            'business_address' => $validated['business_address'] ?? null,
            'purpose' => $validated['purpose'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'requirements_submitted' => $validated['requirements_submitted'],
            'fee' => $fee,
            'status' => 'pending'
        ]);

        // Create transaction record
        if ($fee > 0) {
            Transaction::create([
                'user_id' => Auth::id(),
                'transactionable_type' => Permit::class,
                'transactionable_id' => $permit->id,
                'amount' => $fee,
                'payment_status' => 'pending',
                'reference_number' => 'TXN-' . Str::random(8) . '-' . time()
            ]);
        }

        return redirect()->route('permits.index')
            ->with('success', 'Permit application submitted successfully!');
    }

    private function calculateFee($permitType) {
        $fees = [
            'business' => 500.00,
            'construction' => 300.00,
            'special_event' => 200.00,
            'health' => 150.00,
            'other' => 100.00
        ];

        return $fees[$permitType] ?? 0;
    }

    public function show(Permit $permit) {
        if ($permit->user_id !== Auth::id() && Auth::user()->user_type === 'resident') {
            abort(403);
        }

        return view('permits.show', compact('permit'));
    }
}