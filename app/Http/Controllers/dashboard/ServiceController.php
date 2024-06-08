<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;

use App\Http\Request\Dashboard\Service\StoreServiceRequest;
use App\Http\Request\Dashboard\Service\UpdateServiceRequest;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Synfony\Component\HttpFoundation\Response;

use File;
use Auth;

use App\Models\Service;
use App\Models\AdvantageService;
use App\Models\Tagline;
use App\Models\AdvantageUser;
use App\Models\ThumbnailService;
use App\Models\Order;
use App\Models\User;



class ServiceController extends Controller
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
        $services = Service::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('pages.dashboard.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        // add to service
        $service = Service::create($data);

        // add to advantage service
        foreach($data['advantage-service'] as $key => $value){
            $advantage_service = new AdvantageService;
            $advantage_service->service_id = $service->id;
            $advantage_service->advantage_id = $value;
            $advantage_service->save(); 
        }

        // add to advantage user
        foreach($data['advantage-user'] as $key => $value){
            $advantage_user = new AdvantageService;
            $advantage_user->service_id = $service->id;
            $advantage_user->advantage_id = $value;
            $advantage_user->save(); 
        }

        // add to thumbnail
        if($request->hasfile('thumbnail')){
            foreach($request->file('thumbnail') as $file)
            {
                $path = $file->store(
                    'assets/service/thumbnail', 'public'
                );

                $thumbnail_service = new ThumbnailService;
                $thumbnail_service->service_id = $service['id'];
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();
            }
        }

        // add to tagline
        foreach($data['tagline'] as $key => $value){
        $tagline = new Tagline;
        $tagline->service_id = $service['id'];
        $tagline->thumbnail = $value;
        $tagline->save();
        }

        toast()->success('Save has been Success');
        return redirect()->route('member.service.index');
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
    public function edit(Service $service)
    {
        $advantage_service = AdvantageService::where('service_id', $service->id)->get();
        $tagline = Tagline::where('service_id', $service['id'])->get();
        $advantage_user = AdvantageUser::where('service_id', $service['id'])->get();
        $thumbnail_service = ThumbnailService::where('service_id', $service['id'])->get();

        return view('pages.dashboard.service.edit', compact('service', 'advantage_service', 'advantage_user', 'tagline', 'thumbnail_service'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->all();

        $service->update($data);

        // update to advantage service
        foreach($data['advantage-service'] as $key => $value){
            $advantage_service = AdvantageService::find($key);
            $advantage_service->advantage = $value;
            $advantage_service->save(); 
        }

        if(isset($data['advantage_service'])){
            foreach($data['advantage-service'] as $key => $value){
                $advantage_service = AdvantageService::find($key);
                $advantage_service->service_id = $service['id '];
                $advantage_service->advantage = $value;
                $advantage_service->save(); 
            }
        }

        // update to advantage user
        foreach($data['advantage-user'] as $key => $value){
            $advantage_user = AdvantageUser::find($key);
            $advantage_user->advantage = $value;
            $advantage_user->save(); 
        }

        if(isset($data['advantage_user'])){
            foreach($data['advantage-user'] as $key => $value){
                $advantage_user = AdvantageUser::find($key);
                $advantage_user->service_id = $service['id '];
                $advantage_user->advantage = $value;
                $advantage_user->save(); 
            }
        }

        // update to Tagline
        foreach($data['tagline'] as $key => $value){
            $tagline = Tagline::find($key);
            $tagline->tagline = $value;
            $tagline->save(); 
        }

        if(isset($data['tagline'])){
            foreach($data['tagline-user'] as $key => $value){
                $tagline = Tagline::find($key);
                $tagline->service_id = $service['id '];
                $tagline->tagline = $value;
                $tagline->save(); 
            }
        }

        // update to Thumbnail
        if($request->hasfile('thumbnails')){
            foreach($request->file('thumbnails') as $key => $value){
                $get_photo = ThumbnailService::where('id', $key)->first();


                $path = $file->store(
                    'assets/service/thumbnails', 'public'
                );

                $thumbnail_service = ThumbnailService::find($key);
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();

                $data = 'storage/' .get_photo['photo'];
                if(File::exists($data)){
                    File::delete($data);
                }else{
                    File::delete('storage/app/public/' .$get_photo['photo']);
                }
            }
        }

        if($request->hasfile('thumbnail')){
            foreach($request->file('thumbnail') as $file){
                $path = $file->store(
                    'assets/service/thumbnail', 'public'
                );

                $thumbnail_service = new ThumbnailService;
                $thumbnail_service->service_id = $service['id'];
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();

            }
        }

        toast()->success('Update has been Success');
        return redirect()->route('member.service.index');
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
}
