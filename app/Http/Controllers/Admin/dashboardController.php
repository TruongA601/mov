<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;


class dashboardController extends Controller
{
    public function adminpage()
    {
        $user = User::all();
        $movie = Movie::all();
        $booking = Booking::all();
        $cinema = Cinema::all();
        $yearlyRevenueData = $this->getYearlyRevenueChartData();
        return view('admin.dashboard', compact('movie', 'user', 'booking', 'cinema', 'yearlyRevenueData'));
    }
     
    public function getMonthlyRevenueChartData($year)
    {
        try {
            $data = [];
            for ($month = 1; $month <= 12; $month++) {
                $monthlyTotal = Booking::whereYear('booking_time', $year)
                    ->whereMonth('booking_time', $month)
                    ->sum('total_price');
    
                $data[] = [
                    'month' => $month,
                    'total_price' => $monthlyTotal,
                ];
            }
            return $data;
        } catch (\Exception $e) {
            Log::error('Error processing monthly revenue chart data: ' . $e->getMessage());
            return ['error' => 'Internal Server Error'];
        }
        
    }
    public function getYearlyRevenueChartData()
    {
        try {
            $currentYear = Carbon::now()->year;
            $data = [];

            for ($year = $currentYear; $year >= $currentYear - 5; $year--) {
                $yearlyTotal = Booking::whereYear('booking_time', $year)
                    ->sum('total_price');

                $data[] = [
                    'year' => $year,
                    'total_price' => $yearlyTotal,
                ];
            }

            return $data;
        } catch (\Exception $e) {
            Log::error('Error processing yearly revenue chart data: ' . $e->getMessage());
            return ['error' => 'Internal Server Error'];
        }
    }
}
