<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IPProduct;

class IPProductController extends Controller {

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
		return view('ip.index')
				->with('products', IPProduct::all());
	}

	public function create($id = '')
	{
		if(!empty($id)) {
			$product = IPProduct::find($id);
		} else {
			$product = new IPProduct;
		}
		return view('ip.create')
				->with('product', $product);
	}

	public function store(Request $request, $id = '')
	{
		// echo $id;
		if(empty($id)) {
			$product = new IPProduct;
		} else {
			$product = IPProduct::find($id);
		}

		$product->fill($request->input());
		
		if($product->save()) {
			flash()->success($product->name . ' was saved.');
		} else {
			flash()->danger($product->name . ' could not be saved.');
		}

		return redirect()
				->route('ip.index.get')
				->with('products', IPProduct::all());
	}

	public function destroy($id)
	{
		IPProduct::destroy($id);
		return redirect()
				->route('ip.index.get')
				->with('products', IPProduct::all());	
	}
}
