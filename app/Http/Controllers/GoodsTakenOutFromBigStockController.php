<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\BigStock;
use App\SmallStock;
use App\SaleStock;  
use App\ GoodsTakenOut;
use lluminate\Database\Query\Builder\decrement;
use lluminate\Database\Query\Builder\update;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;

class GoodsTakenOutFromBigStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::id();
        $items   = GoodsTakenOut::select('goods_taken_out_from_big_stock.*','quantity_out','item_destination','item_name','item_code','origin')
        ->join('big_stocks','big_stocks.id','=','goods_taken_out_from_big_stock.bigstock_id')
        ->get();
        return view('admin.goods_taken_out')->with('items',$items);
    }


     public function stockOut()
    {
        $stockout          =new BigStock;
        $stockout->bigstock_id = $stockout->id;
        $stockout= BigStock::select('big_stocks.*','item_code')
        ->get();
        return view('admin.take_stock_out')->with('stockout',$stockout);
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
    public function store(Request $request  )
    {
        $userid=Auth::id();

        $items                          =new GoodsTakenOut;

        $items->user_id                 =$userid;
        $items->bigstock_id             =Input::get('bigstock_id');
        $items->quantity_out            =Input::get("quantity_out");
        $items->item_destination        =Input::get("item_destination");
        $items->approved_by             =Input::get("approved_by");


        if ($items->save())

        $sell = new BigStock;
        $item_quantity =$request->get('bigstock_id');
        $items_quantity =$items->quantity_out;

        $itemss_quantity =Input::get('total');

        
        
        

        $sell= DB::table('big_stocks')
        ->where('id',$item_quantity)
        ->decrement('cartons',$items_quantity);

        if(DB::table('big_stocks')->where('id',$item_quantity)== true){
           DB::table('big_stocks')->where('id', $item_quantity)->update(['total' => $itemss_quantity]);
        }

        return redirect ('/take_stock_out');
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
