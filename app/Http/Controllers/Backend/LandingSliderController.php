<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\LandingSlider;
use Intervention\Image\Facades\Image;

class LandingSliderController extends Controller
{
    public function AllSlider()
    {
        $sliders = LandingSlider::latest()->get();
        return view('landing.slider.slider_all', compact('sliders'));
    } // End Method

    public function AddSlider()
    {
        return view('landing.slider.slider_add');
    } // End Method

    public function StoreSlider(Request $request)
    {
        $image = $request->file('landing_slider_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(1349, 394)
            ->save('upload/landing_slider/' . $name_gen);
        $save_url = 'upload/landing_slider/' . $name_gen;

        LandingSlider::insert([
            'landing_slider_title' => $request->landing_slider_title,
            'landing_short_title' => $request->landing_short_title,
            'landing_slider_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Landing Slider Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.landing.slider')
            ->with($notification);
    } // End Method

    public function EditSlider($id)
    {
        $sliders = LandingSlider::findOrFail($id);
        return view('landing.slider.slider_edit', compact('sliders'));
    } // End Method

    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('landing_slider_image')) {
            $image = $request->file('landing_slider_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(1349, 394)
                ->save('upload/landing_slider/' . $name_gen);
            $save_url = 'upload/landing_slider/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            LandingSlider::findOrFail($slider_id)->update([
                'landing_slider_title' => $request->landing_slider_title,
                'landing_short_title' => $request->landing_short_title,
                'landing_slider_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Landing Slider Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.slider')
                ->with($notification);
        } else {
            LandingSlider::findOrFail($slider_id)->update([
                'landing_slider_title' => $request->landing_slider_title,
                'landing_short_title' => $request->landing_short_title,
            ]);

            $notification = [
                'message' => 'Landing Slider Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.slider')
                ->with($notification);
        } // end else
    } // End Method

    public function DeleteSlider($id)
    {
        $slider = LandingSlider::findOrFail($id);
        $img = $slider->landing_slider_image;
        unlink($img);

        LandingSlider::findOrFail($id)->delete();

        $notification = [
            'message' => 'Landing Slider Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
