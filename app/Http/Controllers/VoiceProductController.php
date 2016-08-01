<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VoiceProduct;
use App\Models\ProductPackage;

class VoiceProductController extends Controller {

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
	 * Show the voice Product Index.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('voice.index')
				->with('products', VoiceProduct::all())
				->with('packages', ProductPackage::all());
	}

	public function create($id = '')
	{
		if(!empty($id)) {
			$product = VoiceProduct::find($id);
		} else {
			$product = new VoiceProduct;
		}
		return view('voice.create')
				->with('product', $product)
				->with('packages', ProductPackage::all());
	}

	public function store(Request $request, $id = '')
	{
		$prices = $request->input('packagePrice');
		if(empty($id)) {
			$product = new VoiceProduct;
		} else {
			$product = VoiceProduct::find($id);
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
				->route('voice.index.get')
				->with('products', VoiceProduct::all())
				->with('packages', ProductPackage::all());
	}

	public function destroy($id)
	{
		voiceProduct::destroy($id);
		return redirect()
				->route('voice.index.get')
				->with('products', VoiceProduct::all())
				->with('packages', ProductPackage::all());
	}

}
