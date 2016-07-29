<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InternetProduct;

class InternetProductController extends Controller {

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
		return view('internet.index')
				->with('products', InternetProduct::all());
	}

	public function create($id = '')
	{
		if(!empty($id)) {
			$product = InternetProduct::find($id);
		} else {
			$product = new InternetProduct;
		}
		return view('internet.create')
				->with('product', $product);
	}

	public function store(Request $request, $id = '')
	{
		// echo $id;
		if(empty($id)) {
			$product = new InternetProduct;
		} else {
			$product = InternetProduct::find($id);
		}

		$product->fill($request->input());
		
		if($product->save()) {
			flash()->success($product->name . ' was saved.');
		} else {
			flash()->danger($product->name . ' could not be saved.');
		}

		return redirect()
				->route('internet.index.get')
				->with('products', InternetProduct::all());
	}

	public function destroy($id)
	{
		InternetProduct::destroy($id);
		return redirect()
				->route('internet.index.get')
				->with('products', InternetProduct::all());	
	}
}
