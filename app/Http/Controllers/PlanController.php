<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Rinvex\Subscriptions\Models\Plan;
use App\Models\Plan;

class PlanController extends Controller
{
    // Display a listing of the plans
    public function index()
    {
        $plans = Plan::all(); 
        return view('admin.plans.index', compact('plans'));
    }

    // Show the form for creating a new plan
    public function create()
    {
        return view('admin.plans.create');
    }

    // Store a newly created plan
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'slug' => 'required|string|max:255',
        //     'price' => 'required|numeric|min:0',
        //     'interval' => 'required|string|in:day,month,year',
        //     'interval_count' => 'required|integer|min:1',
        //     'description' => 'nullable|string',
        // ]);

        Plan::create([
            'name' => $request->name,
            'price' => $request->price,
            'signup_fee' => $request->signup_fee,
            'currency' => $request->currency,
            'interval' => $request->interval,
            'interval_count' => $request->interval_count,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully!');
    }

    // Show the form for editing the specified plan
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    // Update the specified plan
    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'interval' => 'required|string|in:day,month,week',
            'interval_count' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $plan->update($validated);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully!');
    }

    // Remove the specified plan from storage
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully!');
    }
}

