<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TVProduct;

class TVProductController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

	/**
	 * Show the TV Product Index.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('tv.index')
				->with('products', TVProduct::all());
	}

	public function create($id = '')
	{
		if(!empty($id)) {
			$product = TVProduct::find($id);
		} else {
			$product = new TVProduct;
		}
		return view('tv.create')
				->with('product', $product);
	}

	public function store(Request $request, $id = '')
	{
		// echo $id;
		if(empty($id)) {
			$product = new TVProduct;
		} else {
			$product = TVProduct::find($id);
		}

		$product->fill($request->input());
		if($product->save()) {
			flash()->success($product->name . ' was saved.');
		} else {
			flash()->danger($product->name . ' could not be saved.');
		}

		return redirect()
				->route('tv.index.get')
				->with('products', TVProduct::all());
	}

	public function destroy($id)
	{
		TVProduct::destroy($id);
		return redirect()
				->route('tv.index.get')
				->with('products', TVProduct::all());	
	}

}
