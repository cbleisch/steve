<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TvProduct;
use App\Models\ProductPackage;

class TvProductController extends Controller {

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
				->with('products', TvProduct::all())
				->with('packages', ProductPackage::all());
	}

	public function create($id = '')
	{
		if(!empty($id)) {
			$product = TvProduct::find($id);
		} else {
			$product = new TvProduct;
		}
		return view('tv.create')
				->with('product', $product)
				->with('packages', ProductPackage::all());
	}

	public function store(Request $request, $id = '')
	{
		$prices = $request->input('packagePrice');
		if(empty($id)) {
			$product = new TvProduct;
		} else {
			$product = TvProduct::find($id);
		}

		$product->fill($request->input());
		if($product->save()) {
			$product->packages()->sync([]);
            foreach ($request->input('packages') as $packageID) {
                $pPackage = ProductPackage::find($packageID);
                $product->packages()->save($pPackage, ['price' => $prices[$packageID]]);
		 	} 
			flash()->success($product->name . ' was saved.');
		} else {
			flash()->danger($product->name . ' could not be saved.');
		}

		return redirect()
				->route('tv.index.get')
				->with('products', TvProduct::all())
				->with('packages', ProductPackage::all());
	}

	public function destroy($id)
	{
		TvProduct::destroy($id);
		return redirect()
				->route('tv.index.get')
				->with('products', TvProduct::all())
				->with('packages', ProductPackage::all());	
	}

	public function getPrice($id, $packageID) {
		$product = TvProduct::find($id)->packages()->having('product_packages.id', '=', $packageID)->get();

		return $product[0]->pivot->price;
	}

}
