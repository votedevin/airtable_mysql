<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Project;
use App\Models\Commitment;
use App\Models\Menuedit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class CommitmentController extends Controller
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

        $commitments = DB::table('commitments')->get();
        return view('pages.commitments', compact('commitments'))->withUser($user)->withAccess($access);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commitmentview()
    {
        $menus = DB::table('menu')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->paginate(20);
        return view('frontend.commitments', compact('commitments','menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datasync()
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
        $agencyupdate = DB::table('agencies')->first();
        $projectupdate = DB::table('projects')->first();
        $commitmentupdate = DB::table('commitments')->first();

        return view('pages.datasync', compact('agencyupdate', 'projectupdate', 'commitmentupdate'))->withUser($user)->withAccess($access);
    }

    public function noncitycostdesc()
    {
        $menus = DB::table('menu')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.noncitycost','desc')->paginate(20);
        return view('frontend.commitments', compact('commitments','menus'));
    }

    public function noncitycostasc()
    {
        $menus = DB::table('menu')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.noncitycost','asc')->paginate(20);
        return view('frontend.commitments', compact('commitments','menus'));
    }

    public function citycostdesc()
    {   
        $menus = DB::table('menu')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.citycost','desc')->paginate(20);
        return view('frontend.commitments', compact('commitments','menus'));
    }

    public function citycostasc()
    {
        $menus = DB::table('menu')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.citycost','asc')->paginate(20);
        return view('frontend.commitments', compact('commitments','menus'));
    }


    public function find(Request $request)
    {
        $menus = DB::table('menu')->get();
        $find = $request->input('find');
        $commitments = DB::table('commitments')->where('commitmentdescription',  'like', '%'.$find.'%')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->paginate(20);
        return view('frontend.commitments', compact('commitments','menus'));
    }

    public function updatecommitment()
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
        
        return view('pages.commitments')->withUser($user)->withAccess($access);
    }
}
