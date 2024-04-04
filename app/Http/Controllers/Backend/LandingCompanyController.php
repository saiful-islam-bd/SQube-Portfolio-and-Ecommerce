<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingCompany;
use Intervention\Image\Facades\Image;

class LandingCompanyController extends Controller
{
    //
    public function AllCompany()
    {
        $company = LandingCompany::latest()->get();
        return view('landing.company.company_all', compact('company'));
    } // End Method

    public function AddCompany()
    {
        return view('landing.company.company_add');
    } // End Method

    public function StoreCompany(Request $request)
    {
        $image = $request->file('landing_company_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(356, 267)
            ->save('upload/landing_company/' . $name_gen);
        $save_url = 'upload/landing_company/' . $name_gen;

        LandingCompany::insert([
            'landing_company_title' => $request->landing_company_title,
            'landing_company_url' => $request->landing_company_url,
            'landing_company_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Landing Slider Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.landing.company')
            ->with($notification);
    } // End Method

    public function EditCompany($id)
    {
        $company = LandingCompany::findOrFail($id);
        return view('landing.company.company_edit', compact('company'));
    } // End Method

    public function UpdateCompany(Request $request)
    {
        $company_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('landing_company_image')) {
            $image = $request->file('landing_company_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(356, 267)
                ->save('upload/landing_company/' . $name_gen);
            $save_url = 'upload/landing_company/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            LandingCompany::findOrFail($company_id)->update([
                'landing_company_title' => $request->landing_company_title,
                'landing_company_url' => $request->landing_company_url,
                'landing_company_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Landing Company Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.company')
                ->with($notification);
        } else {
            LandingCompany::findOrFail($company_id)->update([
                'landing_company_title' => $request->landing_company_title,
                'landing_company_url' => $request->landing_company_url,
            ]);

            $notification = [
                'message' => 'Landing Company Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.company')
                ->with($notification);
        } // end else
    } // End Method

    public function DeleteCompany($id)
    {
        $company = LandingCompany::findOrFail($id);
        $img = $company->landing_company_image;
        unlink($img);

        LandingCompany::findOrFail($id)->delete();

        $notification = [
            'message' => 'Landing Company Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
