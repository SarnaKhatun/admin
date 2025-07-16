<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class ServiceController extends Controller
{
    use ImageHandler;
    public function index() {
        $services = Service::latest()->get();
        return view('backend.service.index', compact('services'));
    }

    public function create() {
        $categories = ServiceCategory::latest()->get();
        return view('backend.service.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $this->uploadImage(
                $request->file('image'),
                'uploads/images/services/image',
                'public'
            );
        }

        $service = new Service();
        $service->category_id = $request->category_id;
        $service->title = $request->title;
        $service->heading = $request->heading;
        $service->url = $request->url;
        $service->other_title = $request->other_title;
        $service->other_heading = $request->other_heading;
        $service->details = $request->details;
        $service->image = $image;
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service created successfully.');
    }

    public function statusChange($id)
    {
        $service = Service::find($id);
        $service->status = !$service->status;
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service status updated successfully.');
    }

    public function edit($id)
    {
        $categories = ServiceCategory::latest()->get();
        $service = Service::find($id);
        return view('backend.service.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $this->replaceImage(
                $request->file('image'),
                $service->image,
                'uploads/images/services/image',
                'public'
            );
            $service->image = $image;

        } elseif ($request->has('image') && is_null($request->image)) {
            // If image field is manually cleared (for optional delete)
            $this->deleteImage($service->image, 'public');
            $service->image = null;
        }


        $service->category_id = $request->category_id;
        $service->title = $request->title;
        $service->heading = $request->heading;
        $service->url = $request->url;
        $service->details = $request->details;
        $service->other_title = $request->other_title;
        $service->other_heading = $request->other_heading;
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }
    public function delete(Request $request, $id)
    {
        $service = Service::find($id);

        if ($service->image) {

            $this->deleteImage($service->image);
        }
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}
