<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingTeam;
use Intervention\Image\Facades\Image;

class LandingTeamController extends Controller
{
    public function AllTeam()
    {
        $teams = LandingTeam::latest()->get();
        return view('landing.team.team_all', compact('teams'));
    } // End Method

    public function AddTeam()
    {
        return view('landing.team.team_add');
    } // End Method

    public function StoreTeam(Request $request)
    {
        $image = $request->file('landing_team_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(196, 196)
            ->save('upload/landing_team/' . $name_gen);
        $save_url = 'upload/landing_team/' . $name_gen;

        LandingTeam::insert([
            'landing_team_name' => $request->landing_team_name,
            'landing_team_designation' => $request->landing_team_designation,
            'landing_team_paragraph' => $request->landing_team_paragraph,
            'landing_team_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Team Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.landing.team')
            ->with($notification);
    } // End Method

    public function EditTeam($id)
    {
        $teams = LandingTeam::findOrFail($id);
        return view('landing.team.team_edit', compact('teams'));
    } // End Method

    public function UpdateTeam(Request $request)
    {
        $team_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('landing_team_image')) {
            $image = $request->file('landing_team_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(196, 196)
                ->save('upload/landing_team/' . $name_gen);
            $save_url = 'upload/landing_team/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            LandingTeam::findOrFail($team_id)->update([
                'landing_team_name' => $request->landing_team_name,
                'landing_team_designation' => $request->landing_team_designation,
                'landing_team_paragraph' => $request->landing_team_paragraph,
                'landing_team_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Team Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.team')
                ->with($notification);
        } else {
            LandingTeam::findOrFail($team_id)->update([
                'landing_team_name' => $request->landing_team_name,
                'landing_team_designation' => $request->landing_team_designation,
                'landing_team_paragraph' => $request->landing_team_paragraph,
            ]);

            $notification = [
                'message' => 'Team Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.landing.team')
                ->with($notification);
        } // end else
    } // End Method

    public function DeleteTeam($id)
    {
        $team = LandingTeam::findOrFail($id);
        $img = $team->landing_team_image;
        unlink($img);

        LandingTeam::findOrFail($id)->delete();

        $notification = [
            'message' => 'Team Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
