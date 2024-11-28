<?php

namespace App\Http\Controllers;

use App\Models\CarouselItem;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $carouselItems = CarouselItem::all();
        return view('admin.manage_home', compact('carouselItems'));
    }
    public function manage_home()
    {
        $carouselItems = CarouselItem::all();
        return view('admin.manage_home', compact('carouselItems'));
    }
    public function daftar_slideshow()
    {
        $carouselItems = CarouselItem::all();
        return view('admin2.daftar_slideshow', compact('carouselItems'));
    }

    public function create()
    {
        return view('carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('carousel_images', 'public');

        CarouselItem::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('manage_home')->with('success', 'Agenda berhasil disimpan');
    }

    public function edit($id)
    {
        $carouselItem = CarouselItem::findOrFail($id);
        return view('admin.edit_slideshow', compact('carouselItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $carouselItem = CarouselItem::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('carousel_images', 'public');
            $carouselItem->update([
                'title' => $request->title,
                'description' => $request->description,
                'image_path' => $imagePath,
            ]);
        } else {
            $carouselItem->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('daftar_slideshow')->with('success', 'Agenda berhasil disimpan');
    }

    public function destroy($id)
    {
        $carouselItem = CarouselItem::findOrFail($id);
        $carouselItem->delete();
        return redirect()->route('daftar_slideshow')->with('success', 'Agenda berhasil disimpan');
    }
}
