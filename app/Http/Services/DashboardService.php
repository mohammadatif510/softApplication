<?php

namespace App\Http\Services;

class DashboardService 
{

    public function dashboardIndex()
    {
        return view('admin.dashboard');
    }

}