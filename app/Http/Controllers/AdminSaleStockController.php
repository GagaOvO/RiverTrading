<?php

namespace App\Http\Controllers;

use Auth;
use App\BigStock;
use App\AdminSmallStock;
use App\TakenOutFromSmallStock;
use App\SmallStock;  
use App\ GoodsTakenOut;
use App\AddedToSmallStock;
use App\AddedToSaleStock;
use Excel;
use DB;
use App\AdminSaleStock;
use App\TakenOutFromSaleStock;
use lluminate\Database\Query\Builder\decrement;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;

class AdminSaleStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid =Auth::id();
        $sell          =new AdminSaleStock;
        $sell->smallstock_id = $sell->id;
        $sell= AdminSaleStock::select('sale_stocks.*','item_code')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view('admin.sale_stock')->with('sell',$sell);
    }

    public function salestock()
    {
        $userid =Auth::id();
        $salestock_in          =new AdminSaleStock;
        $salestock_in->smallstock_id = $salestock_in->id;
        $salestock_in= AdminSaleStock::select('sale_stocks.*','item_code','item_name','item_desc')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('item_code', 'desc')
        ->get();
        return view('admin.salestock')->with('salestock_in',$salestock_in);
    }

    public function new_stock_entry ()
    {

        $userid =Auth::id();
        $salestock          =new AdminSmallStock;
        $salestock->smallstock_id = $salestock->id;
        $salestock= AdminSmallStock::select('small_stocks.*','item_code')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view('admin.new_stock_entry')->with('salestock',$salestock);
    }

    public function AddToStock()
    {
        $userid= Auth::id();
        $addstock          =new AdminSaleStock;
        $addstock->smallstock_id = $addstock->id;
        $addstock= AdminSaleStock::select('sale_stocks.*','item_code')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view('admin.add_to_stock')->with('addstock',$addstock);
    }

    public function salestock_new_stock (Request $request) 
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


        return redirect ('/add_to_stock');
    }

    public function AddedToStock () 
    {
        $userid =Auth::id();
        
        $added_stock = AddedToSaleStock::select('added_to_sale_stocks.*','item_code','item_name','item_desc')
        ->join('sale_stocks','sale_stocks.id','=','added_to_sale_stocks.salestock_id')
        ->join('small_stocks','small_stocks.id','=','sale_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view ('admin.added_stock')->with('added_stock',$added_stock);
    }

    public function salestock_entry (Request $request)
    {
        $userid=Auth::id();

        $sale_stock =new AdminSaleStock;
        $sale_stock->user_id                 =$userid;
        $sale_stock->smallstock_id           =Input::get("smallstock_id");
        $sale_stock->quantity_received       =Input::get("quantity_received");
        $sale_stock->quantity                =Input::get("quantity");
        $sale_stock->size                    =Input::get("size");
        $sale_stock->cartons                 =Input::get("cartons");
        $sale_stock->piece_per_cartons       =Input::get("piece_per_cartons");
        $sale_stock->total                   =Input::get("total");
        $sale_stock->origin                  =Input::get("origin");
        $sale_stock->approved_by             =Input::get("approved_by");
        $sale_stock->comment                 =Input::get("comment");

        $sale_stock->save();

        return redirect('/new_stock_entry');
    }


    public function Excel(Request $request)
    {

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $value) {        
                            $insert[] = [
                            'user_id'               =>Auth::id(),
                            'smallstock_id'         => $value['smallstock_id'] ,
                            'quantity_received'     => $value['quantity_received'] ,
                            'quantity'              => $value['quantity'] ,
                            'size'                  => $value['size'] ,
                            'cartons'               => $value['cartons'] ,
                            'piece_per_cartons'     => $value['piece_per_cartons'],
                            'total'                 => $value['total'],
                            'origin'                => $value['origin'],
                            'approved_by'           => $value['approved_by'],
                            'comment'               => $value['comment'],
                            'created_at'            => $value['created_at'],
                            ];
                        }
                    }
                }
                if(!empty($insert)){
                    AdminSaleStock::insert($insert);
                }
            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
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

        return redirect ('/sale_stock');
    }

    public function Upstore(Request $request)
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

        return redirect ('/sale_stock');
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
