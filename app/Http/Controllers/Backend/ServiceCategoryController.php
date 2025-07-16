<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index() {
        $categories = ServiceCategory::latest()->get();
        return view('backend.service-category.index', compact('categories'));
    }

    public function create() {
        return view('backend.service-category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $slider = new ServiceCategory();
        $slider->name = $request->name;
        $slider->save();
        return redirect()->route('service-category.index')->with('success', 'Service category created successfully.');
    }

    public function edit($id)
    {
        $service_cate = ServiceCategory::find($id);
        return view('backend.service-category.create', compact('service_cate'));
    }

    public function update(Request $request, $id)
    {
        $service = ServiceCategory::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $service->name = $request->name;
        $service->save();
        return redirect()->route('service-category.index')->with('success', 'Service category updated successfully.');
    }
    public function delete(Request $request, $id)
    {
        $serviceCate = ServiceCategory::find($id);
        $service = Service::where('category_id', $serviceCate->id)->first();
        if ($service) {
            return redirect()->route('service-category.index')->with('error', 'This Service category already used in services.');
        }
        $serviceCate->delete();
        return redirect()->route('service-category.index')->with('success', 'Service category deleted successfully.');
    }
}
