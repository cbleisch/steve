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

	public function store(Request $request, $id = '', $print = 0)
	{
		if(empty($id)) {
			$proposal = new Proposal;
		} else {
			$proposal = Proposal::find($id);
		}
		$printing = '';
		if(!empty($print)) {
			$printing = ' for printing';
		}


		$proposal->fill($request->input());
		
		if($proposal->voice_lines_under_four_qty < 3) {
			$proposal->voice_lines_over_four_price_extended = '0.00';
		}

		if($proposal->save()) {
			flash()->success("Proposal for $proposal->customer was saved$printing.");
		} else {
			flash()->danger($proposal->name . ' could not be saved.');
		}
		
		if(!empty($print)) {
			return redirect()
				->route('proposal.print.get', [$proposal->id])
				->with('proposal', Proposal::find($id));
		} else {
			return redirect()
				->route('proposal.index.get')
				->with('proposals', Proposal::all());
		}
	}

	public function destroy($id)
	{
		Proposal::destroy($id);
		return redirect()
				->route('proposal.index.get')
				->with('proposals', Proposal::all());	
	}

	public function printy($id)
	{
		return view('proposals.print')
				->with('proposal', Proposal::find($id));
	}
}
