<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CookiePreferencePage; 

class CookiePreferencePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CookiePreferencePage $cookiePreferencePage)
    { 
        return view('admin.cms-pages.edit_cookie_preference',compact('cookiePreferencePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Websetting $webSetting)
    {
        $request->validate([
            'header_heading' => 'required|string|max:255',
            'header_title' => 'required|string',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'header_desc' => 'nullable|string',
            
            'cookie_preference_desc' => 'required|string',
            
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:500',
            // Add other fields as per your form...
        ]);

        if ($request->hasFile('site_logo')) {
            // Delete old file
            if ($webSetting->site_logo && file_exists(public_path('assets/uploads/websettings/' . $webSetting->site_logo))) {
                unlink(public_path('assets/uploads/websettings/' . $webSetting->site_logo));
            }

            // Upload new file
            $file = $request->file('site_logo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/websettings/'), $filename);
            $webSetting->site_logo = $filename;
        }

        if ($request->hasFile('site_favicon')) {
            // Delete old file
            if ($webSetting->site_favicon && file_exists(public_path('assets/uploads/websettings/' . $webSetting->site_favicon))) {
                unlink(public_path('assets/uploads/websettings/' . $webSetting->site_favicon));
            }

            // Upload new file
            $file = $request->file('site_favicon');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/uploads/websettings/'), $filename);
            $webSetting->site_favicon = $filename;
        }

        $webSetting->site_name = $request->site_name;
        $webSetting->facebook_url = $request->facebook_url;
        $webSetting->instagram_url = $request->instagram_url;
        $webSetting->twitter_url = $request->twitter_url;
        $webSetting->youtube_url = $request->youtube_url;
        $webSetting->linkedin_url = $request->linkedin_url;
        $webSetting->instagram_url = $request->instagram_url;
        $webSetting->pininterest_url = $request->pininterest_url;
        $webSetting->footer_shortdesc = $request->footer_shortdesc;
        $webSetting->copyright_text = $request->copyright_text;
        $webSetting->opening_hours = $request->opening_hours;
        $webSetting->customers_in_countries = $request->customers_in_countries;
        $webSetting->offices_in_countries = $request->offices_in_countries;

        $webSetting->meta_title = $request->meta_title;
        $webSetting->meta_description = $request->meta_description;
        $webSetting->meta_keywords = $request->meta_keywords;

        $webSetting->from_name = $request->from_name;
        $webSetting->from_email = $request->from_email;
        $webSetting->to_name = $request->to_name;
        $webSetting->to_email = $request->to_email;
        $webSetting->mail_mailer = $request->mail_mailer;
        $webSetting->mail_host = $request->mail_host;
        $webSetting->mail_port = $request->mail_port;
        $webSetting->mail_username = $request->mail_username;
        $webSetting->mail_password = $request->mail_password;
        $webSetting->mail_encryption = $request->mail_encryption;

        $webSetting->save();

        return redirect()->route('admin.web-setting.edit', $webSetting->id)->with('success', 'Website settings updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
