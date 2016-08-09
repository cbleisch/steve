<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Proposal;
use App\Models\ProductPackage;

class proposalController extends Controller {

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
	 * Show the Proposal Index.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('proposals.index')
				->with('proposals', Proposal::all());
	}

	public function create($id = '')
	{
		if(!empty($id)) {
			$proposal = Proposal::find($id);
		} else {
			$proposal = new Proposal;
		}
		return view('proposals.create')
				->with('proposal', $proposal)
				->with('packages', ProductPackage::all());
	}

	public function store(Request $request, $id = '')
	{
		// $internetOptions = $request->input('internet_product_id');
		// echo $internetOptions[$request->input('package_id')];
		
		// var_dump($request->input());
		// die;

		if(empty($id)) {
			$proposal = new Proposal;
		} else {
			$proposal = Proposal::find($id);
		}


		$proposal->fill($request->input());
		if($proposal->save()) {
			flash()->success($proposal->name . ' was saved.');
		} else {
			flash()->danger($proposal->name . ' could not be saved.');
		}

		return redirect()
				->route('proposal.index.get')
				->with('proposals', Proposal::all());
	}

	public function destroy($id)
	{
		Proposal::destroy($id);
		return redirect()
				->route('proposal.index.get')
				->with('proposals', Proposal::all());	
	}


}
