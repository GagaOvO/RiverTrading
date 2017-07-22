<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\BigStock;
use App\AdminSmallStock;
use App\TakenOutFromSmallStock;
use App\AddedToSmallStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SmallStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $userid = Auth::id();
        $smallstocks = AdminSmallStock::select('small_stocks.*','item_code','item_name','item_desc')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('smallstock.smallstock_dashboard')->with('smallstocks',$smallstocks);
    }

    public function index()
    {
        $userid = Auth::id();
        $smallstock   = AdminSmallStock::select('small_stocks.*','item_code','item_name','item_desc')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('smallstock.smallstock')->with('smallstock',$smallstock);
    }

    public function smallstock_in () 
    {
        $userid =Auth::id();
        $stock_in          =new BigStock;
        $stock_in->bigstock_id = $stock_in->id;
        $stock_in= BigStock::select('big_stocks.*','item_code')
        ->get();
        return view('smallstock.take_stock_in')->with('stock_in',$stock_in);
    }

    public function smallstock_out () 
    {
        $userid =Auth::id();
        $stock_out          =new AdminSmallStock;
        $stock_out->bigstock_id = $stock_out->id;
        $stock_out= AdminSmallStock::select('small_stocks.*','item_code')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view ('smallstock.take_stock_out')->with('stock_out',$stock_out);
    }

    public function update_stock ()
    {

        $userid =Auth::id();
        $add_stock          =new AdminSmallStock;
        $add_stock->bigstock_id = $add_stock->id;
        $add_stock= AdminSmallStock::select('small_stocks.*','item_code')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view('smallstock.update_existing_stock')->with('add_stock',$add_stock);
    }

    public function smallstock_taken_out()
    {   
        $userid = Auth::id();

        $taken_out   = TakenOutFromSmallStock::select('goods_taken_out_from_small_stock.*','item_code','item_name','item_desc')
        ->join('small_stocks','small_stocks.id','=','goods_taken_out_from_small_stock.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view ('smallstock.goods_taken_out')->with('taken_out',$taken_out);
    }

    public function smallstock_added ()
    {
        $userid =Auth::id();
        
        $stock_added = AddedToSmallStock::select('added_to_small_stocks.*','item_code','item_name','item_desc')
        ->join('small_stocks','small_stocks.id','=','added_to_small_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view ('smallstock.recently_added')->with('stock_added',$stock_added);
    }

    public function SmallStockUpdate(Request $request )
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

        return redirect ('/smallstocker_take_stock_out');
    }

    public function addTostock (Request $request)
    {

        $userid=Auth::id();

        $new_stock                          =new  AddedToSmallStock;

        $new_stock->user_id                 =$userid;
        $new_stock->smallstock_id           =Input::get('smallstock_id');
        $new_stock->quantity_added          =Input::get("quantity_added");
        $new_stock->approved_by             =Input::get("approved_by");


        if ($new_stock->save())

        $newstock = new AdminSmallStock;

        $newstock =$request->get('smallstock_id');
        $new_stocks =$new_stock->quantity_added;
    
        $itemss_quantity=Input::get('total');

        $sell= DB::table('small_stocks')
        ->where('id',$newstock)
        ->increment('cartons',$new_stocks);

        if(DB::table('small_stocks')->where('id',$newstock)== true){
           DB::table('small_stocks')->where('id', $newstock)->update(['total' => $itemss_quantity]);
        }


        return redirect ('/update_small_stock');
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
        $userid=Auth::id();


        $stock          =new AdminSmallStock;

        $stock->user_id                 =$userid;
        $stock->bigstock_id             =Input::get("bigstock_id");
        $stock->size                    =Input::get("size");
        $stock->cartons                 =Input::get("cartons");
        $stock->piece_per_cartons       =Input::get("piece_per_cartons");
        $stock->total                   =Input::get("total");
        $stock->origin                  =Input::get("origin");
        $stock->approved_by             =Input::get("approved_by");
        $stock->comment                 =Input::get("comment");

        $stock->save();

        return redirect('/take_stock_in');
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
