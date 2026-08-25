<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSlide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomepageSlideController extends Controller
{
    public function index()
    {
        $slides = HomepageSlide::ordenados()->get();

        return view('admin.homepage.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.homepage.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'imagen' => 'required|image|max:5120',
            'imagen_alt' => 'nullable|string|max:255',
            'orden' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $path = $request->file('imagen')->store('homepage', 'public');

        HomepageSlide::create([
            'imagen' => $path,
            'imagen_alt' => $request->input('imagen_alt'),
            'orden' => $request->input('orden', 0),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.homepage.index')
            ->with('status', 'Slide creado correctamente.');
    }

    public function edit(HomepageSlide $slide)
    {
        return view('admin.homepage.edit', compact('slide'));
    }

    public function update(Request $request, HomepageSlide $slide): RedirectResponse
    {
        $request->validate([
            'imagen' => 'nullable|image|max:5120',
            'imagen_alt' => 'nullable|string|max:255',
            'orden' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        if ($request->hasFile('imagen')) {
            $this->deleteUploadedImage($slide);
            $slide->imagen = $request->file('imagen')->store('homepage', 'public');
        }

        $slide->imagen_alt = $request->input('imagen_alt');
        $slide->orden = $request->input('orden', 0);
        $slide->is_active = $request->boolean('is_active', true);
        $slide->save();

        return redirect()->route('admin.homepage.index')
            ->with('status', 'Slide actualizado correctamente.');
    }

    public function destroy(HomepageSlide $slide): RedirectResponse
    {
        $this->deleteUploadedImage($slide);
        $slide->delete();

        return redirect()->route('admin.homepage.index')
            ->with('status', 'Slide eliminado correctamente.');
    }

    /**
     * Only remove files uploaded to the public disk; legacy slides point
     * at shared assets under public/ that other pages may still use.
     */
    private function deleteUploadedImage(HomepageSlide $slide): void
    {
        if (! $slide->imagen || str_starts_with($slide->imagen, 'assets/')) {
            return;
        }

        $path = storage_path('app/public/'.$slide->imagen);

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
