<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Menuedit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $agencys = DB::table('agencies')->get();
        return view('pages.agencies', compact('agencys'))->withUser($user)->withAccess($access);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeview()
    {
       
        return view('frontend.agencies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agencyview()
    {
        $menus = DB::table('menu')->get();
        $agencys = DB::table('agencies')->get();
        return view('frontend.agencies', compact('agencys','menus'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function totalcostdesc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.total_project_cost','desc')->get();
        return view('frontend.agencies', compact('agencys'));
    }


    public function totalcostasc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.total_project_cost','asc')->get();
        return view('frontend.agencies', compact('agencys'));
    }

    public function projectsdesc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.projects','desc')->get();
        return view('frontend.agencies', compact('agencys'));
    }

    public function projectsasc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.projects','asc')->get();
        return view('frontend.agencies', compact('agencys'));
    }

    public function commitmentsdesc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.commitments','desc')->get();
        return view('frontend.agencies', compact('agencys'));
    }

    public function commitmentsasc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.commitments','asc')->get();
        return view('frontend.agencies', compact('agencys'));
    }
    public function find(Request $request)
    {
        $find = $request->input('find');
        $agencys = DB::table('agencies')->where('magencyname',  'like', '%'.$find.'%')->get();
        return view('frontend.agencies', compact('agencys'));
    }
    public function commitmentlink($id)
    {
        $agencys = DB::table('agencies')->where('magency', $id)->get();
        return view('frontend.agencies', compact('agencys'));
    }


    public function totalcostdesc1()
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
        $agencys = DB::table('agencies')->orderBy('agencies.total_project_cost','desc')->get();
        return view('pages.agencies', compact('agencys'))->withUser($user)->withAccess($access);
    }


    public function totalcostasc1()
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
        $agencys = DB::table('agencies')->orderBy('agencies.total_project_cost','asc')->get();
        return view('pages.agencies', compact('agencys'))->withUser($user)->withAccess($access);
    }

    public function projectsdesc1()
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
        $agencys = DB::table('agencies')->orderBy('agencies.projects','desc')->get();
        return view('pages.agencies', compact('agencys'))->withUser($user)->withAccess($access);
    }

    public function projectsasc1()
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
        $agencys = DB::table('agencies')->orderBy('agencies.projects','asc')->get();
        return view('pages.agencies', compact('agencys'))->withUser($user)->withAccess($access);
    }

    public function commitmentsdesc1()
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
        $agencys = DB::table('agencies')->orderBy('agencies.commitments','desc')->get();
        return view('pages.agencies', compact('agencys'))->withUser($user)->withAccess($access);
    }

    public function commitmentsasc1()
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
        $agencys = DB::table('agencies')->orderBy('agencies.commitments','asc')->get();
        return view('pages.agencies', compact('agencys'))->withUser($user)->withAccess($access);
    }
    public function find1(Request $request)
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
        $find = $request->input('find');
        $agencys = DB::table('agencies')->where('magencyname',  'like', '%'.$find.'%')->get();
        return view('pages.agencies', compact('agencys'))->withUser($user)->withAccess($access);
    }

}
