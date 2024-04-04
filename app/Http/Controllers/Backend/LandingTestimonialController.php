<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingTestimonial;
use Intervention\Image\Facades\Image;

class LandingTestimonialController extends Controller
{
    public function AllTestimonial()
    {
        $testimonials = LandingTestimonial::latest()->get();
        return view('landing.testimonial.testimonial_all', compact('testimonials'));
    } // End Method

    public function AddTestimonial()
    {
        return view('landing.testimonial.testimonial_add');
    } // End Method

    public function StoreTestimonial(Request $request)
    {
        $image = $request->file('landing_testimonial_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(90, 90)
            ->save('upload/landing_testimonial/' . $name_gen);
        $save_url = 'upload/landing_testimonial/' . $name_gen;

        LandingTestimonial::insert([
            'landing_testimonial_name' => $request->landing_testimonial_name,
            'landing_testimonial_designation' => $request->landing_testimonial_designation,
            'landing_testimonial_paragraph' => $request->landing_testimonial_paragraph,
            'landing_testimonial_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Testimonial Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.landing.testimonial')
            ->with($notification);
    } // End Method

    public function EditTestimonial($id)
    {
        $testimonials = LandingTestimonial::findOrFail($id);
        return view('landing.testimonial.testimonial_edit', compact('testimonials'));
    } // End Method

    public function UpdateTestimonial(Request $request)
    {
        $testimonial_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('landing_testimonial_image')) {
            $image = $request->file('landing_testimonial_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(90, 90)
                ->save('upload/landing_testimonial/' . $name_gen);
            $save_url = 'upload/landing_testimonial/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            LandingTestimonial::findOrFail($testimonial_id)->update([
                'landing_testimonial_name' => $request->landing_testimonial_name,
                'landing_testimonial_designation' => $request->landing_testimonial_designation,
                'landing_testimonial_paragraph' => $request->landing_testimonial_paragraph,
                'landing_testimonial_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Testimonial Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.testimonial')
                ->with($notification);
        } else {
            LandingTestimonial::findOrFail($testimonial_id)->update([
                'landing_testimonial_name' => $request->landing_testimonial_name,
                'landing_testimonial_designation' => $request->landing_testimonial_designation,
                'landing_testimonial_paragraph' => $request->landing_testimonial_paragraph,
            ]);

            $notification = [
                'message' => 'Testimonial Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.tetestimonialam')
                ->with($notification);
        } // end else
    } // End Method

    public function DeleteTestimonial($id)
    {
        $testimonial = LandingTestimonial::findOrFail($id);
        $img = $testimonial->landing_testimonial_image;
        unlink($img);

        LandingTestimonial::findOrFail($id)->delete();

        $notification = [
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
