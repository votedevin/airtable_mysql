<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menuedit;
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
	    $menuedits = DB::table('menu')->get();

	    return view('pages.menuedit', compact('menuedits'))->withUser($user)->withAccess($access);
	}

	public function store(Request $request)
    {
    	$id = $request->input('menu_id');
    	echo $id;
    	$menu=  Menuedit::find($id);
        $menu->menu_label= $request->input('menu_label');
        echo $menu->menu_label;
        $menu->menu_link = $request->input('menu_link');
        $menu->save();
        //$this->bids->create($request);
        
        return redirect('/pages/menuedit');
    }
}
