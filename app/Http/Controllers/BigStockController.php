<?php

namespace App\Http\Controllers;
use Auth;
use App\BigStock;
use App\GoodsTakenOut;
use App\RecentlyAdded;
use App\AddedToSaleStock;
use DB;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;

class BigStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $userid = Auth::id();
        $item   = BigStock::select('big_stocks.*','item_code','item_name','item_desc','origin','approved_by','comment','created_at')
        ->get();
        return view('bigstock.bigstock_dashboard')->with('item',$item);
    }

    public function index()
    {
        $userid = Auth::id();
        $items   = BigStock::select('big_stocks.*','item_code','item_name','item_desc','origin','approved_by','comment','created_at')
        ->get();
        return view('bigstock.bigstock')->with('items',$items);
    }

    public function stocker_take_stock_in ()
    {
        return view ('bigstock.take_stock_in');
    }

    public function view_update_stock ()
    {
        $new_stock          =new BigStock;
        $new_stock->bigstock_id = $new_stock->id;
        $new_stock= BigStock::select('big_stocks.*','item_code')
        ->get();
        return view ('bigstock.update_stock')->with('new_stock',$new_stock);
    }

    public function stocker_take_stock_out ()
    {
        $stockout          =new BigStock;
        $stockout->bigstock_id = $stockout->id;
        $stockout= BigStock::select('big_stocks.*','item_code')
        ->get();
        return view ('bigstock.take_stock_out')->with('stockout',$stockout);
    }

    public function stock_taken_out () 
    {
        $userid = Auth::id();
        $items   = GoodsTakenOut::select('goods_taken_out_from_big_stock.*','quantity_out','item_destination','item_name','item_code','origin')
        ->join('big_stocks','big_stocks.id','=','goods_taken_out_from_big_stock.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('bigstock.goods_takenout')->with('items',$items);
    }

    public function recently_added_stock ()
    {
        $userid =Auth::id();
        
        $added_stock = AddedToSaleStock::select('added_to_sale_stocks.*','item_code','item_name','item_desc')
        ->join('sale_stocks','sale_stocks.id','=','added_to_sale_stocks.salestock_id')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view ('bigstock.recently_added')->with('added_stock',$added_stock);
    }

    public function updateStock(Request $request )
    {
        $userid=Auth::id();

        $new_stock                          =new RecentlyAdded;

        $new_stock->user_id                 =$userid;
        $new_stock->bigstock_id             =Input::get('bigstock_id');
        $new_stock->quantity_added          =Input::get("quantity_added");
        $new_stock->approved_by             =Input::get("approved_by");


        if ($new_stock->save())

        $new_stock = new BigStock;

        $new_stock =$request->get('bigstock_id');
        $new_stocks =Input::get("quantity_added");
        
        $itemss_quantity =Input::get('total');

        $sell= DB::table('big_stocks')
        ->where('id',$new_stock)
        ->increment('cartons',$new_stocks);

        if(DB::table('big_stocks')->where('id',$new_stock)== true){
           DB::table('big_stocks')->where('id', $new_stock)->update(['total' => $itemss_quantity]);
        }

        return redirect ('/update_stock');
    }

    public function StockOut(Request $request)
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

        return redirect ('/stocker_take_stock_out');
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


        $stock          =new BigStock;

        $stock->user_id                 =$userid;
        $stock->item_code               =Input::get("item_code");
        $stock->item_name               =Input::get("item_name");
        $stock->item_desc               =Input::get("item_desc");
        $stock->item_quantity           =Input::get("item_quantity");
        $stock->item_size               =Input::get("item_size");
        $stock->cartons                 =Input::get("cartons");
        $stock->piece_per_carton        =Input::get("piece_per_carton");
        $stock->total                   =Input::get("total");
        $stock->origin                  =Input::get("origin");
        $stock->approved_by             =Input::get("approved_by");
        $stock->comment                 =Input::get("comment");

        $stock->save();

        
        return redirect ('/stocker_take_stock_in');
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
