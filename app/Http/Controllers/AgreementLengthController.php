<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AgreementLength;
use App\Models\ProductPackage;

class AgreementLengthController extends Controller {

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
	 * Show the TV agreementLength Index.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('agreementLengths.index')
				->with('agreementLengths', AgreementLength::all())
				->with('packages', ProductPackage::all());
	}

	public function create($id = '')
	{

		if(!empty($id)) {
			$agreementLength = AgreementLength::find($id);
		} else {
			$agreementLength = new AgreementLength;
		}
		return view('agreementLengths.create')
				->with('agreementLength', $agreementLength)
				->with('packages', ProductPackage::all());
	}

	public function store(Request $request, $id = '')
	{
		$installationFees = $request->input('installationFee');
		if(empty($id)) {
			$agreementLength = new AgreementLength;
		} else {
			$agreementLength = AgreementLength::find($id);
		}

		$agreementLength->fill($request->input());

		if($agreementLength->save()) {
			$agreementLength->packages()->sync([]);
            foreach ($request->input('packages') as $packageID) {
                $pPackage = ProductPackage::find($packageID);
                $agreementLength->packages()->save($pPackage, ['installation_fee' => $installationFees[$packageID]]);
		 	} 
			flash()->success($agreementLength->name . ' was saved.');
		} else {
			flash()->danger($agreementLength->name . ' could not be saved.');
		}

		return redirect()
				->route('agreementLength.index.get')
				->with('agreementLengths', AgreementLength::all())
				->with('packages', ProductPackage::all());
	}

    public function destroy($id)
    {
        AgreementLength::destroy($id);
        return redirect()
                ->route('agreementLength.index.get')
                ->with('agreementLengths', AgreementLength::all())
                ->with('packages', ProductPackage::all());	
    }

    public function getPrice($id, $packageID) {
        $agreementLength = AgreementLength::find($id)->packages()->having('product_packages.id', '=', $packageID)->get();

        return $agreementLength[0]->pivot->installation_fee;
    }
}
