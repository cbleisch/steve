<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductPackage;

class ProductPackageController extends Controller {

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
		return view('package.index')
				->with('packages', ProductPackage::all());
	}

	public function create($id = '')
	{
		if(!empty($id)) {
			$package = ProductPackage::find($id);
		} else {
			$package = new ProductPackage;
		}
		return view('package.create')
				->with('package', $package);
	}

	public function store(Request $request, $id = '')
	{
		// echo $id;
		if(empty($id)) {
			$package = new ProductPackage;
		} else {
			$package = ProductPackage::find($id);
		}

		$package->fill($request->input());
		
		if($package->save()) {
			flash()->success($package->name . ' was saved.');
		} else {
			flash()->danger($package->name . ' could not be saved.');
		}

		return redirect()
				->route('package.index.get')
				->with('products', ProductPackage::all());
	}

	public function destroy($id)
	{
		ProductPackage::destroy($id);
		return redirect()
				->route('package.index.get')
				->with('products', ProductPackage::all());	
	}

	public function getSelects($id)
	{
		$package = ProductPackage::find($id);
		// $internetProducts = $package->internetProducts->lists(['text' => 'name', 'id' => 'id']);
		$internetProducts = $package->internetProducts->map(function($product) {
			return ['id' => $product->id, 'text' => $product->name, 'price' => $product->pivot->price];
		});
		$tvProducts = $package->tvProducts->map(function($product) {
			return ['id' => $product->id, 'text' => $product->name, 'price' => $product->pivot->price];
		});
		$voiceProducts = $package->voiceProducts->map(function($product) {
			return ['id' => $product->id, 'text' => $product->name, 'price' => $product->pivot->price];
		});

		$ipProducts = $package->staticIpProducts->map(function($product) {
			return ['id' => $product->id, 'text' => $product->name, 'price' => $product->pivot->price];
		});

		$agreementLengths = $package->agreementLengths->map(function($length) {
			return ['id' => $length->id, 'text' => $length->name];
		});

		// var_dump($internetProducts);

		// $internetProducts = $package->internetProducts->toJson();
		// var_dump($internetProducts);
		// die;

		// $tvProducts = $package->tvProducts->lists('name', 'id');
		// $voiceProducts = $package->voiceProducts->lists('name', 'id');
		// $ipProducts = $package->staticIpProducts->lists('name', 'id');
		// $agreementLengths = $package->agreementLengths->lists('name', 'id');

		return response()->json([
			'internetSelect' => $internetProducts,
			'tvSelect' => $tvProducts,
			'voiceSelect' => $voiceProducts,
			'agreementLengthsSelect' => $agreementLengths,
			'ipSelect' => $ipProducts,
			'package' => $package
			]);
	}
}
