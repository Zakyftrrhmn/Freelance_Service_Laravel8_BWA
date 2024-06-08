<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Synfony\Component\HttpFoundation\Response;

use File;
use Auth;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use App\Models\OrderStatus;

class RequestController extends Controller
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
        $orders = Order::where('buyer_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();



        return view('pages.dashboard.request.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $order = Order::where('id', $id)->first();

        return view('pages.dashboard.request.detail', compact(order));
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

    // custom

    public function approve($id){
        $order = Order::where()->first();

        $order = Order::find($order['id']);
        $order->order_status_id = 1;
        $order->save();

        toast()->success('Approve has been Success');
        return redirect()->route('member.request.index');
    }
}
