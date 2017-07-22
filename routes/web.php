<?php
use App\Http\Controllers;

use App\BigStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes('');

Route::group(['middleware'=> 'auth'], function()
{
	Route::get('/admin_dashboard' ,'AdminController@index1', function(){

		return view('/admin.admin_dashboard');
	})->name('admin_dashboard');

	Route::get('/bigstock_dashboard','BigStockController@index1', function(){
		return view('/bigstock.bigstock_dashboard');
	})->name('bigstock_dashboard');

	Route::get('/smallstock_dashboard','SmallStockController@index1', function(){
		return view('/smallstock.smallstock_dashboard');
	})->name('smallstock_dashboard');
	
	Route::get('/salestock_dashboard','SaleStockController@index1',function(){
		return view('/salestock.salestock_dashboard');
	})->name('salestock_dashboard');
});


			/* ==============================================================
            		Routing for Managing Application from Admin side
            ============================================================== */ 

            					/* Big Stock Routes */
Route::get('/users',['middleware' => 'auth', 'uses' => 'AdminController@users']);
Route::post('/register_user','UserController@registerUsers');
Route::get('/bigstock',['middleware' => 'auth', 'uses' => 'AdminController@index']);
Route::get('/take_stock_in',['middleware' => 'auth', 'uses' =>'AdminController@view_take_stock_in']);
Route::post('/approve',['middleware' => 'auth', 'uses' =>'AdminController@take_stock_in']);

Route::get('/take_stock_out',['middleware' => 'auth', 'uses' =>'GoodsTakenOutFromBigStockController@stockOut']);
Route::post('/submit',['middleware' => 'auth', 'uses' =>'GoodsTakenOutFromBigStockController@store']);

Route::get('/goods_taken_out',['middleware' => 'auth', 'uses' =>'GoodsTakenOutFromBigStockController@index']);
Route::post('/importExcel',['middleware' => 'auth', 'uses' => 'AdminController@importExcel']);

Route::get('/new_stock',['middleware' => 'auth', 'uses' =>'RecentlyAddedController@index']);
Route::post('/update_existing_stock',['middleware' => 'auth', 'uses' =>'RecentlyAddedController@store']);

Route::get('/recently_added',['middleware' => 'auth', 'uses' =>'RecentlyAddedController@recently_added']);

Route::post('/edit',['middleware' => 'auth', 'uses' =>'UpdateController@UpdateBigStock']);

Route::post ( '/editItem', function (Request $request) {
	
	$rules = array (
			'item_code' => 'required|alpha',
			'item_name' => 'required|alpha',
			'item_desc' => 'required|alpha',
			'item_size' => 'required',
			'cartons' =>  'required|alpha',
			'piece_per_carton' =>  'required|alpha',
			'total' =>  'required|alpha', 
			'origin' =>  'required|alpha', 
			'approved_by' =>  'required|alpha', 
			'comment' =>  'required|alpha'
	);
	$validator = Validator::make ( Input::all (), $rules );
	if ($validator->fails ())
		return Response::json ( array (
				
				'errors' => $validator->getMessageBag ()->toArray () 
		) );
	else {
		
		$data = BigStock::find ( $request->id );
		$data->item_code = ($request->item_code);
		$data->item_name = ($request->item_name);
		$data->item_desc = ($request->item_desc);
		$data->item_size = ($request->item_size);
		$data->cartons = ($request->cartons);
		$data->piece_per_carton = ($request->piece_per_carton);
		$data->total = ($request->total);
		$data->origin = ($request->origin);
		$data->approved_by = ($request->approved_by);
		$data->comment = ($request->comment);
		$data->save ();
		return response ()->json ( $data );
	}
} );
	
								/* Small Stock Routes */

Route::get('/smallstock' , ['middleware' => 'auth', 'uses' =>'AdminSmallStockController@index']);
Route::get('/stock_in', ['middleware' => 'auth', 'uses' =>'AdminSmallStockController@stock_in']);
Route::get('/stock_out', ['middleware' => 'auth', 'uses' =>'GoodsTakenOutFromSmallStockController@stock_out']);
Route::get('/add_new_stock', ['middleware' => 'auth', 'uses' =>'AddedToSmallStockController@add_new_stock']);
Route::get('/stock_taken_out', ['middleware' => 'auth', 'uses' =>'AdminSmallStockController@stock_taken_out']);
Route::get('/stock_added', ['middleware' => 'auth', 'uses' =>'AdminSmallStockController@stock_added']);


Route::post('/add_stock', ['middleware' => 'auth', 'uses' =>'AdminSmallStockController@store']);
Route::post('/out_stock', ['middleware' => 'auth', 'uses' =>'GoodsTakenOutFromSmallStockController@store']);
Route::post('/existing_stock', ['middleware' => 'auth', 'uses' =>'AddedToSmallStockController@store']);

Route::post('/import_stock', ['middleware' => 'auth', 'uses' =>'AdminSmallStockController@importExcel']);




								/* Sale Stock Routes */

Route::get('/sale_stock', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@index']);
Route::get('/salestock', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@salestock']);
Route::get('/new_stock_entry', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@new_stock_entry']);
Route::get('/add_to_stock', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@AddToStock']);
Route::get('/added_stock', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@AddedToStock']);


Route::post('/salestock_entry', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@salestock_entry']);
Route::post('/import', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@Excel']);
Route::post('/sale', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@store']);
Route::post('/pieces', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@Upstore']);
Route::post('/save', ['middleware' => 'auth', 'uses' =>'AdminSaleStockController@salestock_new_stock']);



			/* ==============================================================
            		Routing for Managing Application from Big Stock side
            ============================================================== */ 


Route::get('/goods_in_stock',['middleware' => 'auth', 'uses' => 'BigStockController@index']);
Route::get('/stocker_take_stock_in',['middleware' => 'auth', 'uses' =>'BigStockController@stocker_take_stock_in']);
Route::get('/update_stock',['middleware' => 'auth', 'uses' =>'BigStockController@view_update_stock']);
Route::get('/stocker_take_stock_out',['middleware' => 'auth', 'uses' =>'BigstockController@stocker_take_stock_out']);
Route::get('/goods_takenout',['middleware' => 'auth', 'uses' =>'BigstockController@stock_taken_out']);
Route::get('/recently_added_stock',['middleware' => 'auth', 'uses' =>'BigstockController@recently_added_stock']);


Route::post('/stocker_save',['middleware' => 'auth', 'uses' =>'BigstockController@store']);
Route::post('/updatestock',['middleware' => 'auth', 'uses' =>'BigstockController@updateStock']);
Route::post('/updatestock',['middleware' => 'auth', 'uses' =>'BigstockController@StockOut']);

            /* ==============================================================
            		Routing for Managing Application from Small Stock side
            ============================================================== */ 
Route::get('/small_stock',['middleware' => 'auth', 'uses' =>'SmallStockController@index']);
Route::get('/smallstocker_take_stock_in',['middleware' => 'auth', 'uses' =>'SmallStockController@smallstock_in']);
Route::get('/smallstocker_take_stock_out',['middleware' => 'auth', 'uses' =>'SmallStockController@smallstock_out']);
Route::get('/update_small_stock',['middleware' => 'auth', 'uses' =>'SmallStockController@update_stock']);
Route::get('/taken_out',['middleware' => 'auth', 'uses' =>'SmallStockController@smallstock_taken_out']);
Route::get('/recently_added_small_stock',['middleware' => 'auth', 'uses' =>'SmallStockController@smallstock_added']);



Route::post('/smallstock_add',['middleware' => 'auth', 'uses' =>'SmallStockController@store']);
Route::post('/smallstock_update',['middleware' => 'auth', 'uses' =>'SmallStockController@SmallStockUpdate']);
Route::post('/smallstock_add_to_stock',['middleware' => 'auth', 'uses' =>'SmallStockController@addTostock']);
            /* ==============================================================
            		Routing for Managing Application from Sale Stock side
            ============================================================== */ 

Route::get('/goods_in_salestock',['middleware' => 'auth', 'uses' =>'SaleStockController@index']);
Route::get('/sale_stock_entry',['middleware' => 'auth', 'uses' =>'SaleStockController@saletake_stock_in']);
Route::get('/sale_stock_outing',['middleware' => 'auth', 'uses' =>'SaleStockController@saletake_stock_out']);
Route::get('/salestock_update',['middleware' => 'auth', 'uses' =>'SaleStockController@Update_Stock']);
Route::get('/salestock_recently_added',['middleware' => 'auth', 'uses' =>'SaleStockController@recently_added']);


Route::post('/salestock_store',['middleware' => 'auth', 'uses' =>'SaleStockController@store']);
Route::post('/salestockcartons',['middleware' => 'auth', 'uses' =>'SaleStockController@salestock_cartons']);
Route::post('/salestockpieces',['middleware' => 'auth', 'uses' =>'SaleStockController@salestock_pieces']);
Route::post('/add_to_sale_stock',['middleware' => 'auth', 'uses' =>'SaleStockController@salestock_add_to_existing_stock']);
