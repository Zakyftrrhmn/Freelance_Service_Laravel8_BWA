<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Service\StoreServiceRequest;
use App\Http\Requests\Dashboard\Service\UpdateServiceRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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

    public function index()
    {
        $services = Service::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.dashboard.service.index', compact('services'));
    }

    public function create()
    {
        return view('pages.dashboard.service.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $service = Service::create($data);

        if(isset($data['advantage-service'])){
            foreach($data['advantage-service'] as $value){
                $advantage_service = new AdvantageService;
                $advantage_service->service_id = $service->id;
                $advantage_service->advantage = $value;
                $advantage_service->save(); 
            }
        }

        if(isset($data['advantage_user'])){
            foreach($data['advantage_user'] as $value){
                $advantage_user = new AdvantageUser;
                $advantage_user->service_id = $service->id;
                $advantage_user->advantage = $value;
                $advantage_user->save(); 
            }
        }
        
        if($request->hasfile('thumbnail')){
            foreach($request->file('thumbnail') as $file)
            {
                $path = $file->store('assets/service/thumbnail', 'public');
                $thumbnail_service = new ThumbnailService;
                $thumbnail_service->service_id = $service->id;
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();
            }
        }

        foreach($data['tagline'] as $value){
            $tagline = new Tagline;
            $tagline->service_id = $service->id;
            $tagline->tagline = $value;
            $tagline->save();
        }

        toast()->success('Save has been Success');
        return redirect()->route('member.service.index');
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit(Service $service)
    {
            $service = Service::find($service->id);
            $advantage_service = AdvantageService::where('service_id', $service->id)->get();
            $tagline = Tagline::where('service_id', $service->id)->get();
            $advantage_user = AdvantageUser::where('service_id', $service->id)->get();
            $thumbnail_service = ThumbnailService::where('service_id', $service->id)->get();
        
            return view('pages.dashboard.service.edit', compact('service', 'advantage_service', 'advantage_user', 'tagline', 'thumbnail_service'));
    }
    

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->all();
        $service->update($data);

        if(isset($data['advantage_services'])){
            foreach($data['advantage_services'] as $key => $value){
                $advantage_service = AdvantageService::find($key);
                if ($advantage_service) {
                    $advantage_service->advantage = $value;
                    $advantage_service->save(); 
                }
            }
        }

        if(isset($data['advantage_service'])){
            foreach($data['advantage_service'] as $value){
                $advantage_service = new AdvantageService;
                $advantage_service->service_id = $service->id;
                $advantage_service->advantage = $value;
                $advantage_service->save(); 
            }
        }
        
        if(isset($data['advantage_users'])){
            foreach($data['advantage_users'] as $key => $value){
                $advantage_user = AdvantageUser::find($key);
                if ($advantage_user) {
                    $advantage_user->advantage = $value;
                    $advantage_user->save(); 
                } 
            }
        }
        
        if(isset($data['advantage_user'])){
            foreach($data['advantage_user'] as $value){
                $advantage_user = new AdvantageUser;
                $advantage_user->service_id = $service->id;
                $advantage_user->advantage = $value;
                $advantage_user->save(); 
            }
        }

        if(isset($data['taglines'])) {
            foreach($data['taglines'] as $key => $value) {
                $tagline = Tagline::find($key);
                if ($tagline) {
                    $tagline->tagline = $value;
                    $tagline->save(); 
                } else {
                    // Handle jika data tidak ditemukan
                }
            }
        }
        
        if(isset($data['tagline'])) {
            foreach($data['tagline'] as $value) {
                $newTagline = new Tagline;
                $newTagline->service_id = $service->id;
                $newTagline->tagline = $value;
                $newTagline->save(); 
            }
        }

        if($request->hasfile('thumbnails')){
            foreach($request->file('thumbnails') as $key => $file){
                $get_photo = ThumbnailService::where('id', $key)->first();

                $path = $file->store('assets/service/thumbnails', 'public');

                $thumbnail_service = ThumbnailService::find($key);
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();

                $data = 'storage/' . $get_photo->photo;
                if(File::exists($data)){
                    File::delete($data);
                }else{
                    File::delete('storage/app/public/' . $get_photo->photo);
                }
            }
        }

        if($request->hasfile('thumbnail')){
            foreach($request->file('thumbnail') as $file){
                $path = $file->store('assets/service/thumbnail', 'public');

                $thumbnail_service = new ThumbnailService;
                $thumbnail_service->service_id = $service->id;
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();
            }
        }

        toast()->success('Update has been Success');
        return redirect()->route('member.service.index');
    }

    public function destroy($id)
    {
        return abort(404);
    }
}
