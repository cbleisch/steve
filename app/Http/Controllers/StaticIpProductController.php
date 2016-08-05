<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StaticIpProduct;
use App\Models\ProductPackage;

class StaticIpProductController extends Controller {

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
				->with('products', StaticIpProduct::all())
				->with('packages', ProductPackage::all());
	}

	public function create($id = '')
	{
		if(!empty($id)) {
			$product = StaticIpProduct::find($id);
		} else {
			$product = new StaticIpProduct;
		}
		return view('ip.create')
				->with('product', $product)
				->with('packages', ProductPackage::all());
	}

	public function store(Request $request, $id = '')
	{
		$prices = $request->input('packagePrice');
		if(empty($id)) {
			$product = new StaticIpProduct;
		} else {
			$product = StaticIpProduct::find($id);
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
				->route('ip.index.get')
				->with('products', StaticIpProduct::all())
				->with('packages', ProductPackage::all());
	}

	public function destroy($id)
	{
		StaticIpProduct::destroy($id);
		return redirect()
				->route('ip.index.get')
				->with('products', StaticIpProduct::all())
				->with('packages', ProductPackage::all());
	}

	public function getPrice($id, $packageID) {
		$product = StaticIpProduct::find($id)->packages()->having('product_packages.id', '=', $packageID)->get();

		return $product[0]->pivot->price;
	}
}
