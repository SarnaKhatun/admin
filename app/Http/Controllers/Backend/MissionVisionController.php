<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MissionVision;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;

class MissionVisionController extends Controller
{
    use ImageHandler;
    public function edit()
    {
        $mission_vision = MissionVision::first();
        return view('backend.mission-vision.edit', compact('mission_vision'));
    }

    public function update(Request $request)
    {
        $mission_vision = MissionVision::first() ?? new MissionVision();

        $request->validate([
            'title_one' => 'required|string|max:255',
            'title_two' => 'required|string|max:255',
            'heading' => 'required|string',
            'short_description' => 'required|max:255',
            'long_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'multi_img' => 'nullable|array',
            'multi_img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Only set $image if there's a new file
        if ($request->hasFile('image')) {
            $image = $this->replaceImage(
                $request->file('image'),
                $mission_vision->image,
                'uploads/images/mission-vision/image',
                'public'
            );
            $mission_vision->image = $image;

        } elseif ($request->has('image') && is_null($request->image)) {
            // If image field is manually cleared (for optional delete)
            $this->deleteImage($mission_vision->image, 'public');
            $mission_vision->image = null;
        }


        if ($request->hasFile('multi_img')) {
            $existingImages = $mission_vision->multi_img ? json_decode($mission_vision->multi_img, true) : [];

            $newImages = [];

            foreach ($request->file('multi_img') as $index => $file) {
                $storedImage = $this->replaceImage(
                    $file,
                    $existingImages[$index] ?? null,
                    'uploads/images/mission-vision/image',
                    'public'
                );

                $newImages[] = $storedImage;
            }

            $mission_vision->multi_img = json_encode($newImages);

        } elseif ($request->has('multi_img') && is_array($request->multi_img) && empty($request->multi_img)) {
            $existingImages = $mission_vision->multi_img ? json_decode($mission_vision->multi_img, true) : [];

            foreach ($existingImages as $image) {
                $this->deleteImage($image, 'public');
            }

            $mission_vision->multi_img = null;
        }


        $mission_vision->title_one = $request->title_one;
        $mission_vision->title_two = $request->title_two;
        $mission_vision->heading = $request->heading;
        $mission_vision->short_description = $request->short_description;
        $mission_vision->long_description = $request->long_description;
        $mission_vision->save();

        return redirect()->route('mission-vision.edit')->with('success', 'Mission and Vision updated successfully');
    }
}
