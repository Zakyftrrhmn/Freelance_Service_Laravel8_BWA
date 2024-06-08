<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Synfony\Component\HttpFoundation\Response;

use Auth;

use App\Models\User;
use App\Models\DetailUser;
use App\Models\ExperienceUser;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Service;

class MemberController extends Controller
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
        $orders = Order::where('freelance_id', Auth::user()->id)->get();

        $progress = Order::where('freelance_id', Auth::user()->id)
                                ->where('order_status_id', 2)
                                ->count();  

        $completed = Order::where('freelance_id', Auth::user()->id)
                                ->where('order_status_id', 1)
                                ->count();  

        $freelancer = Order::where('buyer_id', Auth::user()->id)
                                ->where('order_status_id', 2)
                                ->distinct('freelance_id')
                                ->count();  

        return view('pages.dashboard.index', compact('orders', 'progress', 'completed', 'freelancer'));
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
        return abort(404);
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
    public function update(Request $request, $id)
    {
        return abort(404);
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
