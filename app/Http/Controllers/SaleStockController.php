<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\AdminSaleStock;
use App\AddedToSaleStock;
use App\TakenOutFromSaleStock;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SaleStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $userid =Auth::id();
        $salestock_ins          =new AdminSaleStock;
        $salestock_ins->smallstock_id = $salestock_ins->id;
        $salestock_ins= AdminSaleStock::select('sale_stocks.*','item_code','item_name','item_desc')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('salestock.salestock_dashboard')->with('salestock_ins',$salestock_ins);
    }

    public function index()
    {
        $userid =Auth::id();
        $salestock_in          =new AdminSaleStock;
        $salestock_in->smallstock_id = $salestock_in->id;
        $salestock_in= AdminSaleStock::select('sale_stocks.*','item_code','item_name','item_desc')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('salestock.salestock')->with('salestock_in',$salestock_in);
    }

    public function saletake_stock_in ()
    {
        $userid =Auth::id();
        $sell          =new AdminSaleStock;
        $sell->smallstock_id = $sell->id;
        $sell= AdminSaleStock::select('sale_stocks.*','item_code')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view('salestock.take_stock_in')->with('sell',$sell);
    }

    public function saletake_stock_out ()
    {
        $userid =Auth::id();
        $sell          =new AdminSaleStock;
        $sell->smallstock_id = $sell->id;
        $sell= AdminSaleStock::select('sale_stocks.*','item_code')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view('salestock.take_stock_out')->with('sell',$sell);
    }

    public function Update_Stock()
    {
        $userid= Auth::id();
        $addstock          =new AdminSaleStock;
        $addstock->smallstock_id = $addstock->id;
        $addstock= AdminSaleStock::select('sale_stocks.*','item_code')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view('salestock.update_existing_stock')->with('addstock',$addstock);
    }

    public function recently_added () 
    {
        $userid =Auth::id();
        
        $added_stock = AddedToSaleStock::select('added_to_sale_stocks.*','item_code','item_name','item_desc')
        ->join('sale_stocks','sale_stocks.id','=','added_to_sale_stocks.salestock_id')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view ('salestock.recently_added')->with('added_stock',$added_stock);
    }

    public function salestock_cartons(Request $request)
    {
        $userid=Auth::id();

        $items                          =new TakenOutFromSaleStock;

        $items->user_id                 =$userid;
        $items->salestock_id            =Input::get('salestock_id');
        $items->quantity_out            =Input::get("quantity_out");
        $items->item_destination        =Input::get("item_destination");
        $items->approved_by             =Input::get("approved_by");


        if ($items->save())

        $sell = new AdminSaleStock;

        $item_quantity  =$request->get('salestock_id');
        $items_quantity =$items->quantity_out;
        
        $itemss_quantity=Input::get('total');
        
        $sell= DB::table('sale_stocks')
        ->where('id',$item_quantity)
        ->decrement('cartons',$items_quantity);

        if(DB::table('sale_stocks')->where('id',$item_quantity)== true){
           DB::table('sale_stocks')->where('id', $item_quantity)->update(['total' => $itemss_quantity]);
        }

        return redirect ('/sale_stock_outing');
    }

    public function salestock_pieces(Request $request)
    {
        $userid=Auth::id();

        $items                          =new TakenOutFromSaleStock;

        $items->user_id                 =$userid;
        $items->salestock_id            =Input::get('salestock_id');
        $items->quantity_out            =Input::get("quantity_out");
        $items->item_destination        =Input::get("item_destination");
        $items->approved_by             =Input::get("approved_by");


        if ($items->save())

        $sell = new AdminSaleStock;

        $item_quantity  =$request->get('salestock_id');
        $items_quantity =$items->quantity_out;
        
        $itemss_quantity=Input::get('total');
        
        $sell= DB::table('sale_stocks')
        ->where('id',$item_quantity)
        ->decrement('piece_per_cartons',$items_quantity);

        if(DB::table('sale_stocks')->where('id',$item_quantity)== true){
           DB::table('sale_stocks')->where('id', $item_quantity)->update(['total' => $itemss_quantity]);
        }

        return redirect ('/sale_stock_outing');
    }

    public function salestock_add_to_existing_stock (Request $request)
    {
        $userid=Auth::id();

        $new_stock                          =new AddedToSaleStock;

        $new_stock->user_id                 =$userid;
        $new_stock->salestock_id             =Input::get('salestock_id');
        $new_stock->quantity_added          =Input::get("quantity_added");
        $new_stock->approved_by             =Input::get("approved_by");


        if ($new_stock->save())

        $new_stock = new AdminSaleStock;

        $new_stock =$request->get('salestock_id');
        $new_stocks =Input::get("quantity_added");
        
        $itemss_quantity=Input::get('total');

        $sell= DB::table('sale_stocks')
        ->where('id',$new_stock)
        ->increment('cartons',$new_stocks);

        if(DB::table('sale_stocks')->where('id',$new_stock)== true){
           DB::table('sale_stocks')->where('id', $new_stock)->update(['total' => $itemss_quantity]);
        }


        return redirect ('/salestock_update');
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

        $sale_stock =new AdminSaleStock;
        $sale_stock->user_id                 =$userid;
        $sale_stock->smallstock_id           =Input::get("smallstock_id");
        $sale_stock->size                    =Input::get("size");
        $sale_stock->cartons                 =Input::get("cartons");
        $sale_stock->piece_per_cartons       =Input::get("piece_per_cartons");
        $sale_stock->total                   =Input::get("total");
        $sale_stock->origin                  =Input::get("origin");
        $sale_stock->approved_by             =Input::get("approved_by");
        $sale_stock->comment                 =Input::get("comment");

        $sale_stock->save();

        return redirect('/sale_stock_entry');
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
