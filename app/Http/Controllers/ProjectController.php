<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Menutop;
use App\Models\Menumain;
use App\Models\Menuleft;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
//use Cornford\Googlmapper\Mapper;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class ProjectController extends Controller
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
        //$projects = Project::all();
        $projects = DB::table('projects')->leftJoin('agencies', 'projects.project_managingagency', '=', 'agency_recordid')->select('projects.id','projects.project_recordid','projects.project_projectid','agencies.magencyname','projects.project_description','projects.project_commitments','projects.project_totalcost')->orderBy('projects.project_projectid','desc')->get();

        return view('pages.projects', compact('projects'))->withUser($user)->withAccess($access);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectview()
    {
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $projects = DB::table('projects')->leftJoin('agencies', 'projects.project_managingagency', '=', 'agency_recordid')->select('projects.id','projects.project_recordid','projects.project_projectid','agencies.magencyname','projects.project_description','projects.project_commitments','projects.project_totalcost','projects.project_type')->orderBy('projects.project_projectid','desc')->get();
        $projecttypes = DB::table('projects')-> distinct()-> get(['project_type']);
        return view('frontend.projects', compact('projects','menutops','menulefts','menumains','projecttypes'));
    }

    //agencyname find
    public function agencyfind($id)
    {
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $projects = DB::table('projects')->where('project_managingagency', $id)->leftJoin('agencies', 'projects.project_managingagency', '=', 'agency_recordid')->select('projects.id','projects.project_recordid','projects.project_projectid','agencies.magencyname','projects.project_description','projects.project_commitments','projects.project_totalcost','projects.project_type')->orderBy('projects.project_projectid','desc')->get();
       $projecttypes = DB::table('projects')-> distinct()-> get(['project_type']);

        return view('frontend.projects', compact('projects','menutops','menulefts','menumains','projecttypes'));
    }
    //agencyname find-admin
    public function agencyfind1($id)
    {
        $menus = DB::table('menu')->get();
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
        //$projects = Project::all();
        $projects = DB::table('projects')->where('project_managingagency', $id)->leftJoin('agencies', 'projects.project_managingagency', '=', 'agency_recordid')->select('projects.id','projects.project_recordid','projects.project_projectid','agencies.magencyname','projects.project_description','projects.project_commitments','projects.project_totalcost')->orderBy('projects.project_projectid','desc')->get();

        return view('pages.projects', compact('projects'))->withUser($user)->withAccess($access);
    }

    public function projectfind($id)
    {   
       
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $projects = DB::table('projects')->where('project_recordid', $id)->leftJoin('agencies', 'projects.project_managingagency', '=', 'agency_recordid')->select('projects.project_projectid','agencies.magencyname','projects.project_description','projects.project_commitments','projects.project_totalcost','projects.project_citycost','projects.project_noncitycost','projects.project_type','projects.project_lat','projects.project_long')->first();
        $lat = DB::table('projects')->where('project_recordid', $id)-> value('project_lat');
        $long = DB::table('projects')->where('project_recordid', $id)-> value('project_long');
        Mapper::map($lat, $long, ['zoom' => 15]);
       $commitments = DB::table('commitments')->where('projectid', $id)->get();

        return view('frontend.profile', compact('commitments','projects','menutops','menulefts','menumains'));
    }

    //project type find
    public function projecttypefind($id)
    {
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $projecttype = DB::table('projects')->where('project_type', $id)->value('project_type');
        $projects = DB::table('projects')->where('project_type', $id)->leftJoin('agencies', 'projects.project_managingagency', '=', 'agency_recordid')->select('projects.id','projects.project_recordid','projects.project_projectid','agencies.magencyname','projects.project_description','projects.project_commitments','projects.project_totalcost','projects.project_type')->orderBy('projects.project_projectid','desc')->get();
       $projecttypes = DB::table('projects')-> distinct()-> get(['project_type']);

        return view('frontend.projecttype', compact('projects','menutops','menulefts','menumains','projecttypes','projecttype'));
    }

    public function projectfind1($id)
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

        $projects = DB::table('projects')->where('project_recordid', $id)->leftJoin('agencies', 'projects.project_managingagency', '=', 'agency_recordid')->select('projects.project_projectid','agencies.magencyname','projects.project_description','projects.project_commitments','projects.project_totalcost','projects.project_citycost','projects.project_noncitycost')->first();
        $commitments = DB::table('commitments')->where('projectid', $id)->get();

        return view('pages.profile', compact('commitments','projects'))->withUser($user)->withAccess($access);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
