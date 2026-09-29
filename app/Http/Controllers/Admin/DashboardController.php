<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrCode;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClients = User::count();

        $activeClients = User::where('status', 'active')->count();

        $onlineClients = User::where(
            'last_seen_at',
            '>=',
            now()->subMinutes(5)
        )->count();

        $offlineClients = $totalClients - $onlineClients;

        $stats = [
            'clients' => $totalClients,
            'active_clients' => $activeClients,
            'online_clients' => $onlineClients,
            'offline_clients' => $offlineClients,
            'qr_codes' => QrCode::count(),
            'today' => QrCode::whereDate(
                'created_at',
                today()
            )->count(),
        ];

        $clients = User::withCount('qrCodes')
            ->latest()
            ->paginate(10);

        $lineLabels = [];
        $lineData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $lineLabels[] = $date->format('M d');

            $lineData[] = QrCode::whereDate(
                'created_at',
                $date
            )->count();
        }

        $inactiveClients = User::where(
            'status',
            '!=',
            'active'
        )->count();

        $pieLabels = [
            'Active',
            'Inactive',
        ];

        $pieData = [
            $activeClients,
            $inactiveClients,
        ];

        $barLabels = [];
        $barData = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);

            $barLabels[] = $month->format('M Y');

            $barData[] = QrCode::whereYear(
                'created_at',
                $month->year
            )
                ->whereMonth(
                    'created_at',
                    $month->month
                )
                ->count();
        }

        return view('admin.dashboard', compact(
            'stats',
            'clients',
            'lineLabels',
            'lineData',
            'pieLabels',
            'pieData',
            'barLabels',
            'barData'
        ));
    }

    public function client(User $user)
    {
        $qrCodes = $user->qrCodes()
            ->latest()
            ->paginate(10);

        return view(
            'admin.client',
            compact('user', 'qrCodes')
        );
    }
}