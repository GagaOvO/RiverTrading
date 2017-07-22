<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\BigStock;
use App\Updates;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $items = Auth::id();
        $items   = BigStock::select('big_stocks.*','item_code','item_name','item_desc','item_quantity','origin','approved_by','comment','created_at')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.bigstock')->with('items',$items);
    }

    public function UpdateBigStock (Request $request)
    {
        $userid=Auth::id();

        $sell = new BigStock;
        $item_quantity =$request->get('fid');

        $itemsss_quantity =Input::get('item_code');
        $itemssss_quantity =Input::get('item_name');
        $itemsssss_quantity =Input::get('item_desc');
        $itemssssss_quantity =Input::get('item_size');
        $itemsssssss_quantity =Input::get('cartons');
        $itemssssssss_quantity =Input::get('piece_per_carton');
        $itemsssssssss_quantity =Input::get('total');
        $itemssssssssss_quantity =Input::get('origin');
        $itemsssssssssss_quantity =Input::get('approved_by');
        $itemssssssssssss_quantity =Input::get('comment');

        
        
        

        $sell= DB::table('big_stocks')
        ->where('id',$item_quantity);

        if(DB::table('big_stocks')->where('id',$item_quantity)== true){
            DB::table('big_stocks')->where('id', $sell)->update(['item_code' => $itemsss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['item_name' => $itemssss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['item_desc' => $itemsssss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['item_size' => $itemssssss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['cartons' => $itemsssssss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['piece_per_carton' => $itemssssssss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['total' => $itemsssssssss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['origin' => $itemssssssssss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['approved_by' => $itemsssssssssss_quantity]);
            DB::table('big_stocks')->where('id', $sell)->update(['comment' => $itemssssssssssss_quantity]);
        }

        return redirect ('/bigstock');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
