<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use ImageHandler;
    public function index() {
        $sliders = Slider::latest()->get();
        return view('backend.slider.index', compact('sliders'));
    }

    public function create() {
        return view('backend.slider.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $this->uploadImage(
                $request->file('image'),
                'uploads/images/sliders/image',
                'public'
            );
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->description = $request->description;
        $slider->image = $image;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Slider created successfully.');
    }

    public function statusChange($id)
    {
        $slider = Slider::find($id);
        $slider->status = !$slider->status;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Slider status updated successfully.');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.create', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $this->replaceImage(
                $request->file('image'),
                $slider->image,
                'uploads/images/sliders/image',
                'public'
            );
            $slider->image = $image;

        } elseif ($request->has('image') && is_null($request->image)) {
            // If image field is manually cleared (for optional delete)
            $this->deleteImage($slider->image, 'public');
            $slider->image = null;
        }


        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->description = $request->description;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }
    public function delete(Request $request, $id)
    {
        $slider_delete = Slider::find($id);

        if ($slider_delete->image) {

            $this->deleteImage($slider_delete->image);
        }
        $slider_delete->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
}
