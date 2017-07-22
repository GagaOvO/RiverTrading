<?php

namespace App\Http\Controllers;

use Auth;
use App\BigStock;
use App\AdminSmallStock;
use App\TakenOutFromSmallStock;
use App\SmallStock;  
use App\ GoodsTakenOut;
use App\AddedToSmallStock;
use Excel;
use DB;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;

class AdminSmallStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $userid = Auth::id();
        $smallstock   = AdminSmallStock::select('small_stocks.*','item_code','item_name','item_desc')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.smallstock')->with('smallstock',$smallstock);
    }

    public function stock_in () 
    {
        $userid =Auth::id();
        $stock_in          =new BigStock;
        $stock_in->bigstock_id = $stock_in->id;
        $stock_in= BigStock::select('big_stocks.*','item_code')
        ->get();
        return view('admin.stock_in')->with('stock_in',$stock_in);
    }


    
    public function stock_taken_out ()
    {
        $userid = Auth::id();

        $taken_out   = TakenOutFromSmallStock::select('goods_taken_out_from_small_stock.*','item_code','item_name','item_desc')
        ->join('small_stocks','small_stocks.id','=','goods_taken_out_from_small_stock.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();

        return view ('admin.stock_taken_out')->with('taken_out',$taken_out);
    }

    public function stock_added ()
    {
        $userid =Auth::id();
        
        $stock_added = AddedToSmallStock::select('added_to_small_stocks.*','item_code','item_name','item_desc')
        ->join('small_stocks','small_stocks.id','=','added_to_small_stocks.smallstock_id')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view ('admin.stock_added')->with('stock_added',$stock_added);
    }





    public function importExcel(Request $request)
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
                            'bigstock_id'           => $value['bigstock_id'] ,
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
                    AdminSmallStock::insert($insert)
                    ->sortByDesc('created_at');
                    return back()->with('success','Insert Record successfully.');
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


        $stock          =new AdminSmallStock;

        $stock->user_id                 =$userid;
        $stock->bigstock_id             =Input::get("bigstock_id");
        $stock->quantity_received       =Input::get("quantity_received");
        $stock->quantity                =Input::get("quantity");
        $stock->size                    =Input::get("size");
        $stock->cartons                 =Input::get("cartons");
        $stock->piece_per_cartons       =Input::get("piece_per_cartons");
        $stock->total                   =Input::get("total");
        $stock->origin                  =Input::get("origin");
        $stock->approved_by             =Input::get("approved_by");
        $stock->comment                 =Input::get("comment");

        $stock->save();

        return redirect('/stock_in');
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
