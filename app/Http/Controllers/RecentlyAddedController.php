<?php


namespace App\Http\Controllers;

use Auth;
use DB;
use App\BigStock;
use App\SmallStock;
use App\SaleStock;  
use App\ GoodsTakenOut;
use App\RecentlyAdded;
use lluminate\Database\Query\Builder\increment;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;

class RecentlyAddedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_stock          =new BigStock;
        $new_stock->bigstock_id = $new_stock->id;
        $new_stock= BigStock::select('big_stocks.*','item_code')
        ->get();
        return view ('admin.new_stock')->with('new_stock',$new_stock);
    }

    public function recently_added()
    {
        $userid= Auth::id();
        $items= RecentlyAdded::select('recently_added.*','quantity_added','item_name','item_code','origin')
        ->join('big_stocks','big_stocks.id','=','recently_added.bigstock_id')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.recently_added')->with('items',$items);
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

        $new_stock                          =new RecentlyAdded;

        $new_stock->user_id                 =$userid;
        $new_stock->bigstock_id             =Input::get('bigstock_id');
        $new_stock->quantity_added          =Input::get("quantity_added");
        $new_stock->approved_by             =Input::get("approved_by");


        if ($new_stock->save())

        $new_stock = new BigStock;

        $new_stock =$request->get('bigstock_id');
        $new_stocks =Input::get("quantity_added");
        
        

        $sell= DB::table('big_stocks')
        ->where('id',$new_stock)
        ->increment('item_quantity',$new_stocks);

        return redirect ('/new_stock');
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
