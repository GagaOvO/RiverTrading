<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\BigStock;
use App\SmallStock;
use App\SaleStock;  
use Excel;
use Illuminate\support\Facades\Input;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users ()
    {
        return view('admin.users');
    }
    public function index1 ()
    {
        $userid = Auth::id();
        $items  = BigStock::select('big_stocks.*','item_code','item_name','item_desc','origin','approved_by','comment','created_at')
        ->get();
        return view('admin.admin_dashboard')->with('items',$items);
    }
    public function index()
    {

        $userid = Auth::id();
        $items  = BigStock::select('big_stocks.*','item_code','item_name','item_desc','origin','approved_by','comment','created_at')
        ->get();
        return view('admin.bigstock')->with('items',$items);
    }

    public function view_take_stock_in ()
    {
        return view ('admin.take_stock_in');
    }

    public function view_edit_stock ()
    {   
        $userid=Auth::id();
        return view ('admin.edit');
    }

    public function view_existing_stock ()
    {
        $new_stock          =new BigStock;
        $new_stock->bigstock_id = $new_stock->id;
        $new_stock= BigStock::select('big_stocks.*','item_code')
        ->get();
        return view ('admin.new_stock')->with('new_stock',$new_stock);
    }

    public function take_stock_in ()
    {
        $userid=Auth::id();


        $stock          =new BigStock;

        $stock->user_id                 =$userid;
        $stock->item_code               =Input::get("item_code");
        $stock->item_name               =Input::get("item_name");
        $stock->item_desc               =Input::get("item_desc");
        $stock->item_size               =Input::get("item_size");
        $stock->cartons                 =Input::get("cartons");
        $stock->piece_per_carton        =Input::get("piece_per_carton");
        $stock->total                   =Input::get("total");
        $stock->origin                  =Input::get("origin");
        $stock->approved_by             =Input::get("approved_by");
        $stock->comment                 =Input::get("comment");

        $stock->save();

        
        return redirect ('/take_stock_in');
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
                            'item_code'             => $value['item_code'] ,
                            'item_name'             => $value['item_name'] ,
                            'item_desc'             => $value['item_desc'] ,
                            'item_quantity'         => $value['item_quantity'] ,
                            'origin'                => $value['origin'],
                            'approved_by'           => $value['approved_by'],
                            'comment'               => $value['comment'],
                            'created_at'            => $value['created_at'],
                            'updated_at'            => $value['updated_at'],
                            ];
                        }
                    }
                }
                if(!empty($insert)){
                    BigStock::insert($insert)
                    ->orderBy('created_at', 'desc');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
        $edit=BigStock::find($id);

        $edit->item_code        =$request->Input('item_code');
        $edit->item_name        =$request->Input('item_name');
        $edit->item_desc        =$request->Input('item_desc');
        $edit->item_size        =$request->Input('item_size');
        $edit->cartons          =$request->Input('cartons');
        $edit->piece_per_carton =$request->Input('piece_per_carton');
        $edit->total            =$request->Input('total');
        $edit->origin           =$request->Input('origin');
        $edit->approved_by      =$request->Input('approved_by');
        $edit->comment          =$request->Input('comment');
        $edit->save();
        return redirect()->back();
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
