<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');
        $allowedSorts = ['id', 'title', 'sort_order'];
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'id';
        }

        $query->orderBy($sortBy, $sortDirection);

        $galleries = $query->paginate(10)->withQueryString();

        $stats = [
            'total' => Gallery::count(),
            'active' => Gallery::where('is_active', true)->count(),
            'inactive' => Gallery::where('is_active', false)->count(),
        ];

        if ($request->ajax() || $request->boolean('ajax')) {
            return response()->json([
                'html' => view('admin.gallery.partials.table-rows', compact('galleries'))->render(),
                'pagination' => view('admin.gallery.partials.pagination', compact('galleries'))->render(),
                'stats' => $stats,
            ]);
        }

        return view('admin.gallery.index', compact('galleries', 'stats'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'image', 'max:5120'],
            'is_active' => ['nullable'],
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => (Gallery::max('sort_order') ?? 0) + 1,
        ]);

        return response()->json(['message' => 'Gallery image added successfully']);
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'is_active' => ['nullable'],
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
        ];

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return response()->json(['message' => 'Gallery image updated successfully']);
    }

    public function toggleStatus(Request $request, Gallery $gallery)
    {
        $gallery->update(['is_active' => $request->boolean('is_active')]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
        ]);
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return response()->json(['message' => 'Gallery image deleted successfully']);
    }
}
