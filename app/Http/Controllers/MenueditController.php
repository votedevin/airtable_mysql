<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menutop;
use App\Models\Menumain;
use App\Models\Menuleft;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class MenueditController extends Controller
{
	public function index()
    {
	    $user           = \Auth::user();
	    $userRole       = $user->hasRole('user');
	    $editorRole     = $user->hasRole('editor');
	    $adminRole      = $user->hasRole('administrator');

	    if($userRole)
	    {
	        $access = 'User';
	    } elseif ($editorRole) {
	        $access = 'Editor';
	    } elseif ($adminRole) {
	        $access = 'Administrator';
	    }
	    $menu_tops = DB::table('menu_top')->get();
	    $menu_mains = DB::table('menu_main')->get();
	    $menu_lefts = DB::table('menu_left')->get();

	    return view('pages.menuedit', compact('menu_tops','menu_mains','menu_lefts'))->withUser($user)->withAccess($access);
	}

	public function create(Request $request)
    {
    	$input = $request->all();

    	Menutop::create($input);

        return redirect('/pages/menuedit');
    }

	public function store(Request $request)
    {
    	$id = $request->input('menu_top_id');
    	$menu_top=  Menutop::find($id);
        $menu_top->menu_top_label= $request->input('menu_top_label');
        $menu_top->menu_top_link = $request->input('menu_top_link');
        $menu_top->save();
        //$this->bids->create($request);
        
        return redirect('/pages/menuedit');
    }

    public function delete(Request $request)
    {
    	$id = $request->input('menu_top_id');

    	$menu_top=  Menutop::find($id);

        $menu_top->delete();
        //$this->bids->create($request);
        
        return redirect('/pages/menuedit');
    }

    public function maincreate(Request $request)
    {
    	$input = $request->all();

    	Menumain::create($input);

        return redirect('/pages/menuedit');
    }

	public function mainstore(Request $request)
    {
    	$id = $request->input('menu_main_id');
    	$menu_main=  Menumain::find($id);
        $menu_main->menu_main_label= $request->input('menu_main_label');
        $menu_main->menu_main_link = $request->input('menu_main_link');
        $menu_main->save();
        //$this->bids->create($request);
        
        return redirect('/pages/menuedit');
    }

    public function maindelete(Request $request)
    {
    	$id = $request->input('menu_main_id');

    	$menu_main=  Menumain::find($id);

        $menu_main->delete();
        //$this->bids->create($request);
        
        return redirect('/pages/menuedit');
    }

    public function leftcreate(Request $request)
    {
    	$input = $request->all();

    	Menuleft::create($input);

        return redirect('/pages/menuedit');
    }

	public function leftstore(Request $request)
    {
    	$id = $request->input('menu_left_id');
    	$menu_left=  Menuleft::find($id);
        $menu_left->menu_left_label= $request->input('menu_left_label');
        $menu_left->menu_left_link = $request->input('menu_left_link');
        $menu_left->save();
        //$this->bids->create($request);
        
        return redirect('/pages/menuedit');
    }

    public function leftdelete(Request $request)
    {
    	$id = $request->input('menu_left_id');

    	$menu_left=  Menuleft::find($id);

        $menu_left->delete();
        //$this->bids->create($request);
        
        return redirect('/pages/menuedit');
    }
}
