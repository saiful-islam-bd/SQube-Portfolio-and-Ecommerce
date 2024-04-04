<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingAbout;
use Intervention\Image\Facades\Image;

class LandingAboutController extends Controller
{
    public function AllAbout()
    {
        $abouts = LandingAbout::latest()->get();
        return view('landing.about.about_all', compact('abouts'));
    } // End Method

    public function AddAbout()
    {
        return view('landing.about.about_add');
    } // End Method

    public function StoreAbout(Request $request)
    {
        $image = $request->file('landing_about_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(665, 600)
            ->save('upload/landing_about/' . $name_gen);
        $save_url = 'upload/landing_about/' . $name_gen;

        LandingAbout::insert([
            'landing_about_description' => $request->landing_about_description,
            'landing_about_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Landing About Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.landing.about')
            ->with($notification);
    } // End Method

    public function EditAbout($id)
    {
        $abouts = LandingAbout::findOrFail($id);
        return view('landing.about.about_edit', compact('abouts'));
    } // End Method

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('landing_about_image')) {
            $image = $request->file('landing_about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
            ->resize(665, 600)
                ->save('upload/landing_about/' . $name_gen);
            $save_url = 'upload/landing_about/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            LandingAbout::findOrFail($about_id)->update([
                'landing_about_description' => $request->landing_about_description,
                'landing_about_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Landing About Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.about')
                ->with($notification);
        } else {
            LandingAbout::findOrFail($about_id)->update([
                'landing_about_description' => $request->landing_about_description,
            ]);

            $notification = [
                'message' => 'Landing About Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.about')
                ->with($notification);
        } // end else
    } // End Method
}
