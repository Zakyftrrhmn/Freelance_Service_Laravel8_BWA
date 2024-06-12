<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Dashboard\Profile\UpdateProfileRequest;
use App\Http\Requests\Dashboard\Profile\UpdateDetailUserRequest;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Synfony\Component\HttpFoundation\Response;

use File;
use Auth;

use App\Models\User;
use App\Models\DetailUser;
use App\Models\ExperienceUser;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $experience_user = ExperienceUser::where('detail_user_id', $user->detail_user->id)
                                                ->orderBy('id', 'asc')
                                                ->get();

        return view('pages.dashboard.profile', compact('user','experience_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request_profile, UpdateDetailUserRequest $request_detail_user)
    {
        $data_profile = $request_profile->all();
        $data_detail_user = $request_detail_user->all();
        $user = Auth::user();
        $detail_user = $user->detail_user;
        
        // Delete old file
        if (isset($data_detail_user['photo'])) {
            $data = 'storage/' . $detail_user->photo;
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/' . $detail_user->photo);
            }
        }
        
        // Store file to storage
        if (isset($data_detail_user['photo'])) {
            $data_detail_user['photo'] = $request_detail_user->file('photo')->store(
                'assets/photo', 'public'
            );
        }
        
        // Proses save to user
        $user->update($data_profile);
        
        // Proses save to detail user
        $detail_user->update($data_detail_user);
        
        // Proses save to Experience
        foreach ($data_profile['experience'] as $key => $value) {
            if (isset($value)) {
                ExperienceUser::updateOrCreate(
                    ['id' => $key, 'detail_user_id' => $detail_user->id],
                    ['experience' => $value]
                );
            }
        }
        
        toast()->success('Update has been successful');
        return back();
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    // custom

    public function delete(){
        // get user photo
        $get_user_photo = DetailUser::where('user_id', Auth::user()->id)->first();
    
        if ($get_user_photo) {
            $path_photo = $get_user_photo->photo;
    
            // Update the photo to NULL
            $data = DetailUser::find($get_user_photo['id']);
            $data->photo = NULL;
            $data->save();
    
            // Delete the file
            $file_path = 'storage/' . $path_photo;
            if (File::exists($file_path)) {
                File::delete($file_path);
            } else {
                File::delete('storage/app/public/' . $path_photo);
            }
    
            toast()->success('Delete has been successful');
        } else {
            toast()->error('No photo found to delete');
        }
    
        return back();
    }
    
}
