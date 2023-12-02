<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function statistics()
    {
        $userCount = User::count();
        $propertyCount = Property::count();
        $locationCount = Location::count();
        $propertyTypeCount = PropertyType::count();

        $recentUsers = User::orderBy('created_at', 'desc')->limit(5)->get();
        $recentProperties = Property::orderBy('created_at', 'desc')->limit(5)->get();

        $today = Carbon::today();
        $newUsersToday = User::whereDate('created_at', $today)->count();
        $newPropertiesToday = Property::whereDate('created_at', $today)->count();

        // Add more statistics as needed...

        return view('admin.dashboard', compact(
            'userCount',
            'propertyCount',
            'locationCount',
            'propertyTypeCount',
            'recentUsers',
            'recentProperties',
            'newUsersToday',
            'newPropertiesToday'
            // Add more variables for additional statistics...
        ));
    }
}
