<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    use ImageHandler;
    public function edit()
    {
        $career = Career::first();
        return view('backend.careers.edit', compact('career'));
    }

    public function update(Request $request)
    {
        $career = Career::first() ?? new Career();

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
                $career->image,
                'uploads/images/careers/image',
                'public'
            );
            $career->image = $image;

        } elseif ($request->has('image') && is_null($request->image)) {
            // If image field is manually cleared (for optional delete)
            $this->deleteImage($career->image, 'public');
            $career->image = null;
        }

        $career->title = $request->title;
        $career->heading = $request->heading;
        $career->details = $request->details;
        $career->save();

        return redirect()->route('careers.edit')->with('success', 'Career updated successfully');
    }
}
