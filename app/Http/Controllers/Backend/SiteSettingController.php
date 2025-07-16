<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Traits\ImageHandler;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    use ImageHandler;
    public function edit()
    {
        $setting = SiteSetting::first();
        return view('backend.site-setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::first() ?? new SiteSetting();

        $request->validate([
            'site_name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
            'facebook_link' => 'required|string|max:255',
            'twitter_link' => 'required|string|max:255',
            'linkedin_link' => 'required|string|max:255',
            'youtube_link' => 'required|string|max:255',
            'instagram_link' => 'required|string|max:255',
            'pinterest_link' => 'required|string|max:255',
            'google_map' => 'required',
            'address' => 'required',
            'description' => 'required',
            'message' => 'required',
            'site_favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_header_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Only set $image if there's a new file
        if ($request->hasFile('site_favicon')) {
            $site_favicon = $this->replaceImage(
                $request->file('site_favicon'),
                $setting->site_favicon,
                'uploads/images/site-settings/site_favicon',
                'public'
            );
            $setting->site_favicon = $site_favicon;

        } elseif ($request->has('site_favicon') && is_null($request->site_favicon)) {
            // If image field is manually cleared (for optional delete)
            $this->deleteImage($setting->site_favicon, 'public');
            $setting->site_favicon = null;
        }


        if ($request->hasFile('site_header_logo')) {
            $site_header_logo = $this->replaceImage(
                $request->file('site_header_logo'),
                $setting->site_header_logo,
                'uploads/images/site-settings/site_header_logo',
                'public'
            );
            $setting->site_header_logo = $site_header_logo;

        } elseif ($request->has('site_header_logo') && is_null($request->site_header_logo)) {
            // If image field is manually cleared (for optional delete)
            $this->deleteImage($setting->site_header_logo, 'public');
            $setting->site_header_logo = null;
        }


        if ($request->hasFile('site_footer_logo')) {
            $site_footer_logo = $this->replaceImage(
                $request->file('site_footer_logo'),
                $setting->site_footer_logo,
                'uploads/images/site-settings/site_footer_logo',
                'public'
            );
            $setting->site_footer_logo = $site_footer_logo;

        } elseif ($request->has('site_footer_logo') && is_null($request->site_footer_logo)) {
            // If image field is manually cleared (for optional delete)
            $this->deleteImage($setting->site_footer_logo, 'public');
            $setting->site_footer_logo = null;
        }

        $setting->site_name = $request->site_name;
        $setting->business_name = $request->business_name;
        $setting->business_hour = $request->business_hour;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->google_map = $request->google_map;
        $setting->address = $request->address;
        $setting->description = $request->description;
        $setting->message = $request->message;
        $setting->facebook_link = $request->facebook_link;
        $setting->twitter_link = $request->twitter_link;
        $setting->linkedin_link = $request->linkedin_link;
        $setting->youtube_link = $request->youtube_link;
        $setting->instagram_link = $request->instagram_link;
        $setting->pinterest_link = $request->pinterest_link;
        $setting->save();

        return redirect()->route('site-settings.edit')->with('success', 'Setting updated successfully');
    }
}
