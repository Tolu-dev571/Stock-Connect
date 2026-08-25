<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livestocks = Livestock::all();

        return view('livestocks.index', compact('livestocks'));
    }

  public function shop()
{
    $livestocks = Livestock::where('status', 'available')
        ->where('quantity', '>', 0)
        ->latest()
        ->get();

    return view('customer.livestock', compact('livestocks'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('livestocks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'breed' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'age' => 'nullable|string|max:100',
        'weight' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:available,sold_out',
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

        $request->file('image')->move(
            public_path('images/livestock'),
            $imageName
        );

        $validated['image'] = 'images/livestock/' . $imageName;
    }

    Livestock::create($validated);

    return redirect()
        ->route('livestock.index')
        ->with('success', 'Livestock added successfully!');

    }
        
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livestock = Livestock::findOrFail($id);

    return view('livestocks.show', compact('livestock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $livestock = Livestock::findOrFail($id);

         return view('livestocks.edit', compact('livestock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'breed' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'age' => 'nullable|string|max:100',
        'weight' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:available,sold_out',
    ]);

    $livestock = Livestock::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | Replace livestock image if a new one was uploaded
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('image')) {

        // Delete old image if one exists
        if (
            $livestock->image &&
            file_exists(public_path($livestock->image))
        ) {
            unlink(public_path($livestock->image));
        }

        $imageName = time() . '_' .
            $request->file('image')->getClientOriginalName();

        $request->file('image')->move(
            public_path('images/livestock'),
            $imageName
        );

        $validated['image'] =
            'images/livestock/' . $imageName;
    }

    $livestock->update($validated);

    return redirect()
        ->route('livestock.index')
        ->with('success', 'Livestock updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $livestock = Livestock::findOrFail($id);

    $livestock->delete();

    return redirect()
        ->route('livestock.index')
        ->with('success', 'Livestock deleted successfully!');
    }

public function reviews()
{
    return $this->hasMany(Review::class);
}

}
