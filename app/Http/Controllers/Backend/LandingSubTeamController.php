<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingSubTeam;
use App\Models\LandingTeam;
use Intervention\Image\Facades\Image;

class LandingSubTeamController extends Controller
{
    public function AllSubTeam()
    {
        $sub_teams = LandingSubTeam::latest()->get();
        return view('landing.sub_team.sub_team_all', compact('sub_teams'));
    } // End Method

    public function AddSubTeam()
    {
        $teams = LandingTeam::latest()->get();
        return view('landing.sub_team.sub_team_add', compact('teams'));
        
    } // End Method

    public function StoreSubTeam(Request $request)
    {
        $image = $request->file('landing_sub_team_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(196, 196)
            ->save('upload/landing_sub_team/' . $name_gen);
        $save_url = 'upload/landing_sub_team/' . $name_gen;

         LandingSubTeam::insert([
            'landing_sub_team_name' => $request->landing_sub_team_name,
            'landing_main_team_id' => $request->landing_main_team_id,
            'landing_sub_team_designation' => $request->landing_sub_team_designation,
            'landing_sub_team_paragraph' => $request->landing_sub_team_paragraph,
            'landing_sub_team_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Sub-Team Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.landing.sub_team')
            ->with($notification);
    } // End Method

    public function EditSubTeam($id)
    {
        $teams = LandingTeam::latest()->get();
        $sub_teams = LandingSubTeam::findOrFail($id);
        return view('landing.sub_team.sub_team_edit', compact('sub_teams','teams'));
    } // End Method

    public function UpdateSubTeam(Request $request)
    {
        $sub_team_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('landing_sub_team_image')) {
            $image = $request->file('landing_sub_team_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(196, 196)
                ->save('upload/landing_sub_team/' . $name_gen);
            $save_url = 'upload/landing_sub_team/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            LandingSubTeam::findOrFail($sub_team_id)->update([
                'landing_sub_team_name' => $request->landing_sub_team_name,
                'landing_sub_team_designation' => $request->landing_sub_team_designation,
                'landing_sub_team_paragraph' => $request->landing_sub_team_paragraph,
                'landing_sub_team_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Sub-Team Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.sub_team')
                ->with($notification);
        } else {
            LandingSubTeam::findOrFail($sub_team_id)->update([
                'landing_sub_team_name' => $request->landing_sub_team_name,
                'landing_sub_team_designation' => $request->landing_sub_team_designation,
                'landing_sub_team_paragraph' => $request->landing_sub_team_paragraph,
            ]);

            $notification = [
                'message' => 'Sub-Team Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.sub_team')
                ->with($notification);
        } // end else
    } // End Method

    public function DeleteSubTeam($id)
    {
        $team = LandingSubTeam::findOrFail($id);
        $img = $team->landing_sub_team_image;
        unlink($img);

        LandingSubTeam::findOrFail($id)->delete();

        $notification = [
            'message' => 'Sub Team Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
