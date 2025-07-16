<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    use ImageHandler;
    public function edit()
    {
        $about = AboutUs::first();
        return view('backend.about-us.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about_us = AboutUs::first() ?? new AboutUs();

        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Only set $image if there's a new file
        if ($request->hasFile('image')) {
            $image = $this->replaceImage(
                $request->file('image'),
                $about_us->image,
                'uploads/images/about-us/image',
                'public'
            );
            $about_us->image = $image;

        } elseif ($request->has('image') && is_null($request->image)) {
            // If image field is manually cleared (for optional delete)
            $this->deleteImage($about_us->image, 'public');
            $about_us->image = null;
        }

        $about_us->title = $request->title;
        $about_us->heading = $request->heading;
        $about_us->details = $request->details;
        $about_us->save();

        return redirect()->route('about-us.edit')->with('success', 'About Us updated successfully');
    }
}
