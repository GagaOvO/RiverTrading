<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\BigStock;
use App\AdminSmallStock;
use App\AddedToSmallStock;
use App\TakenOutFromSmallStock;
use lluminate\Database\Query\Builder\increment;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;

class AddedToSmallStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () 
    {
        //
    }

    public function add_new_stock ()
    {

        $userid =Auth::id();
        $add_stock          =new AdminSmallStock;
        $add_stock->bigstock_id = $add_stock->id;
        $add_stock= AdminSmallStock::select('small_stocks.*','item_code')
        ->join('big_stocks','big_stocks.id','=','small_stocks.bigstock_id')
        ->get();
        return view('admin.add_new_stock')->with('add_stock',$add_stock);
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
        ->increment('quantity',$new_stocks);

        if(DB::table('small_stocks')->where('id',$item_quantity)== true){
           DB::table('small_stocks')->where('id', $item_quantity)->update(['total' => $itemss_quantity]);
        }

        return redirect ('/add_new_stock');
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
