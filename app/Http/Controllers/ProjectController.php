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
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.projects', compact('projects','menutops','menulefts','menumains','projecttypes','mainmenu'));
    }

    //agencyname find
    public function agencyfind($id)
    {
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $projects = DB::table('projects')->where('project_managingagency', $id)->leftJoin('agencies', 'projects.project_managingagency', '=', 'agency_recordid')->select('projects.id','projects.project_recordid','projects.project_projectid','agencies.magencyname','projects.project_description','projects.project_commitments','projects.project_totalcost','projects.project_type')->orderBy('projects.project_projectid','desc')->get();
        $projecttypes = DB::table('projects')-> distinct()-> get(['project_type']);
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.projects', compact('projects','menutops','menulefts','menumains','projecttypes','mainmenu'));
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
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.profile', compact('commitments','projects','menutops','menulefts','menumains','mainmenu','mainmenu'));
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
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.projecttype', compact('projects','menutops','menulefts','menumains','projecttypes','projecttype','mainmenu'));
    }
}
