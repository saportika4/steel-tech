<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $query = Career::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        $sortBy = $request->get('sort_by', 'id');
        $sortDirection = $request->get('sort_direction', 'desc');

        $careers = $query->orderBy($sortBy, $sortDirection)->paginate(10);
        $stats = [
            'total' => Career::count(),
            'active' => Career::where('is_active', 1)->count(),
            'inactive' => Career::where('is_active', 0)->count(),
        ];

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.careers.partials.table-rows', compact('careers'))->render(),
                'pagination' => view('admin.careers.partials.pagination', compact('careers'))->render(),
                'stats' => $stats,
            ]);
        }

        return view('admin.careers.index', compact('careers', 'stats'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['title']);
        $data['published_at'] = now();
        $career = Career::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Vacancy created successfully.',
            'career' => $career
        ]);
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $data = $this->validated($request, $career->id);
        $data['slug'] = Str::slug($data['title']);
        $career->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Vacancy updated successfully.'
        ]);
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vacancy deleted successfully.'
        ]);
    }

    public function toggleStatus(Request $request, Career $career)
    {
        $career->update([
            'is_active' => (bool) $request->is_active
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.'
        ]);
    }

    protected function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['nullable', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'vacancies' => ['required', 'integer', 'min:1'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }
}
