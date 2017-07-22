<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\BigStock;
use App\AdminSmallStock;
use App\TakenOutFromSmallStock;
use lluminate\Database\Query\Builder\decrement;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;


class GoodsTakenOutFromSmallStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function stock_out()
    {   
        $userid =Auth::id();
        $stock_out          =new AdminSmallStock;
        $stock_out->bigstock_id = $stock_out->id;
        $stock_out= AdminSmallStock::select('small_stocks.*','item_code')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view ('admin.stock_out')->with('stock_out',$stock_out);
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
    public function store(Request $request )
    {
        $userid=Auth::id();

        $items                          =new TakenOutFromSmallStock;

        $items->user_id                 =$userid;
        $items->smallstock_id           =Input::get('smallstock_id');
        $items->quantity_out            =Input::get("quantity_out");
        $items->item_destination        =Input::get("item_destination");
        $items->approved_by             =Input::get("approved_by");


        if ($items->save())

        $sell = new AdminSmallStock;

        $item_quantity  =$request->get('smallstock_id');
        $items_quantity =$items->quantity_out;
        
        $itemss_quantity=Input::get('total');
        
        $sell= DB::table('small_stocks')
        ->where('id',$item_quantity)
        ->decrement('cartons',$items_quantity);

        if(DB::table('small_stocks')->where('id',$item_quantity)== true){
           DB::table('small_stocks')->where('id', $item_quantity)->update(['total' => $itemss_quantity]);
        }

        return redirect ('/stock_out');
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
