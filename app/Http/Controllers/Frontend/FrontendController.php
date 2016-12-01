<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Guestbook;
use App\Userrole;
use Illuminate\Http\Request; 
use Response;
use Auth;


/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works!',
        ]);

        return view('frontend.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
	
	 public function guestbook()
    {
        return view('frontend.guestbook');
    }
	
	 public function gallery()
    {
		$guestbooks = Guestbook::all();
		if(Auth::user() != NULL) 
		{
			$role = Userrole::where('user_id', '=', Auth::user()->id)->first();	
			return view('frontend.gallery', compact('guestbooks', 'role'));
		}
		else
		{
			return view('frontend.gallery', compact('guestbooks'));
		}
    }
	
	 public function addGuestbook(Request $request)
    {
        $guestbook = new Guestbook();
		$guestbook->name = $request->name;
		$guestbook->address = $request->address;
		$guestbook->phone = $request->phone;
		$guestbook->note = $request->note;
		$guestbook->save();
		
		return Response::json(
		  [
			'response' => 'Success'
		  ]
		);
    }
	
	 public function deleteGuestbook(Request $request)
    {
        $guestbook = Guestbook::where('id', '=', $request->id)->delete();
		
		return Response::json(
		  [
			'response' => 'Success'
		  ]
		);
    }
}
