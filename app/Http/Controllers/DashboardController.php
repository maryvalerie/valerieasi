<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\Permit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        
        if ($user->user_type === 'resident') {
            $stats = [
                'pending_documents' => DocumentRequest::where('user_id', $user->id)
                    ->where('status', 'pending')->count(),
                'approved_documents' => DocumentRequest::where('user_id', $user->id)
                    ->where('status', 'approved')->count(),
                'pending_permits' => Permit::where('user_id', $user->id)
                    ->where('status', 'pending')->count(),
                'pending_payments' => Transaction::where('user_id', $user->id)
                    ->where('payment_status', 'pending')->count()
            ];

            $recentDocuments = DocumentRequest::with('documentType')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            $recentPermits = Permit::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            return view('dashboard.resident', compact('stats', 'recentDocuments', 'recentPermits'));
        }

        // Admin dashboard
        $stats = [
            'total_documents' => DocumentRequest::count(),
            'pending_documents' => DocumentRequest::where('status', 'pending')->count(),
            'total_permits' => Permit::count(),
            'pending_permits' => Permit::where('status', 'pending')->count()
        ];

        return view('dashboard.admin', compact('stats'));
    }
}