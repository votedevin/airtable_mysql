<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Project;
use App\Models\Commitment;
use App\Models\Menutop;
use App\Models\Menumain;
use App\Models\Menuleft;
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
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->paginate(20);
        return view('frontend.commitments', compact('commitments','menutops','menulefts','menumains'));
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
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.noncitycost','desc')->paginate(20);
        return view('frontend.commitments', compact('commitments','menutops','menulefts','menumains'));
    }

    public function noncitycostasc()
    {
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.noncitycost','asc')->paginate(20);
        return view('frontend.commitments', compact('commitments','menutops','menulefts','menumains'));
    }

    public function citycostdesc()
    {   
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.citycost','desc')->paginate(20);
        return view('frontend.commitments', compact('commitments','menutops','menulefts','menumains'));
    }

    public function citycostasc()
    {
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.citycost','asc')->paginate(20);
        return view('frontend.commitments', compact('commitments','menutops','menulefts','menumains'));
    }


    public function find(Request $request)
    {
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $find = $request->input('find');
        $commitments = DB::table('commitments')->where('commitmentdescription',  'like', '%'.$find.'%')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->paginate(20);
        return view('frontend.commitments', compact('commitments','menutops','menulefts','menumains'));
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
