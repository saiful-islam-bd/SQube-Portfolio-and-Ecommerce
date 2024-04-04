<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\LandingService;
use Intervention\Image\Facades\Image;

class LandingServiceController extends Controller
{
     public function AllService()
    {
        $services = LandingService::latest()->get();
        return view('landing.service.service_all', compact('services'));
    } // End Method
    public function AddService()
    {
        return view('landing.service.service_add');
    } // End Method

    public function StoreService(Request $request)
    {
        $image = $request->file('landing_service_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(120, 120)
            ->save('upload/landing_service/' . $name_gen);
        $save_url = 'upload/landing_service/' . $name_gen;

        LandingService::insert([
            'landing_service_title' => $request->landing_service_title,
            'landing_short_title' => $request->landing_short_title,
            'landing_service_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Landing Slider Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.landing.service')
            ->with($notification);
    } // End Method


    
    public function EditService($id)
    {
        $service = LandingService::findOrFail($id);
        return view('landing.service.service_edit', compact('service'));
    } // End Method

    public function UpdateService(Request $request)
    {
        $service_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('landing_service_image')) {
            $image = $request->file('landing_service_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(120, 120)
                ->save('upload/landing_service/' . $name_gen);
            $save_url = 'upload/landing_service/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            LandingService::findOrFail($service_id)->update([
                'landing_service_title' => $request->landing_service_title,
                'landing_short_title' => $request->landing_short_title,
                'landing_service_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Landing Service Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.service')
                ->with($notification);
        } else {
            LandingService::findOrFail($service_id)->update([
                'landing_service_title' => $request->landing_service_title,
                'landing_short_title' => $request->landing_short_title,
            ]);

            $notification = [
                'message' => 'Landing Service Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.service')
                ->with($notification);
        } // end else
    } // End Method
    public function DeleteService($id)
    {
        $service = LandingService::findOrFail($id);
        $img = $service->landing_service_image;
        unlink($img);

        LandingService::findOrFail($id)->delete();

        $notification = [
            'message' => 'Landing Service Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // End Method

}
