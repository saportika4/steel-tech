<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use Illuminate\Http\Request;

class CareerApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = CareerApplication::with('career');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhereHas('career', fn ($career) => $career->where('title', 'like', "%{$search}%"));
            });
        }

        $applications = $query->latest()->paginate(10);

        return view('admin.careers.applications', compact('applications'));
    }

    public function destroy(CareerApplication $careerApplication)
    {
        $careerApplication->delete();

        return response()->json([
            'success' => true,
            'message' => 'Application deleted successfully.'
        ]);
    }
}
