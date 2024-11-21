<?php

namespace App\Http\Controllers;

use App\Models\Campaign;

class CampaignController extends Controller
{
    /**
     * Display list of campaigns and aggregate revenue for each campaign
     */
    public function index()
    {
        // @TODO implement
        $campaigns = Campaign::withSum('revenues as total_revenue', 'revenue')->paginate(10);
        // echo "<pre>";print_r($campaigns);exit;
        return view('campaigns.home', compact('campaigns'));
    }

    /**
     * Display a specific campaign with a hourly breakdown of all revenue
     */
    public function show(Campaign $campaign)
    {
        // @TODO implement
        $hourlyRevenue = $campaign->revenues()
        ->selectRaw('HOUR(monetization_timestamp) as hour, SUM(revenue) as total_revenue')
        ->groupByRaw('HOUR(monetization_timestamp)')
        ->paginate(10);

        return view('campaigns.show', compact('campaign', 'hourlyRevenue'));
    }

    /**
     * Display a specific campaign with the aggregate revenue by utm_term
     */
    public function publishers(Campaign $campaign)
    {
        // @TODO implement
        $publishers = $campaign->revenues()
        ->select('utm_term')
        ->selectRaw('SUM(revenue) as total_revenue')
        ->groupBy('utm_term')
        ->orderByDesc('total_revenue')
        ->paginate(10);

        return view('campaigns.publishers', compact('campaign', 'publishers'));
    }
}
