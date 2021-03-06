<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Menutop;
use App\Models\Menumain;
use App\Models\Menuleft;
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
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menus','menutops','menulefts','menumains','mainmenu'));
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
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menutops','menulefts','menumains','mainmenu'));
    }


    public function totalcostasc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.total_project_cost','asc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menutops','menulefts','menumains','mainmenu'));
    }

    public function projectsdesc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.projects','desc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menutops','menulefts','menumains','mainmenu'));
    }

    public function projectsasc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.projects','asc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menutops','menulefts','menumains','mainmenu'));
    }

    public function commitmentsdesc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.commitments','desc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menutops','menulefts','menumains','mainmenu'));
    }

    public function commitmentsasc()
    {
        $agencys = DB::table('agencies')->orderBy('agencies.commitments','asc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menutops','menulefts','menumains','mainmenu'));
    }
    public function find(Request $request)
    {
        $find = $request->input('find');
        $agencys = DB::table('agencies')->where('magencyname',  'like', '%'.$find.'%')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menutops','menulefts','menumains','mainmenu'));
    }
    public function commitmentlink($id)
    {
        $agencys = DB::table('agencies')->where('magency', $id)->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('agencys','menutops','menulefts','menumains','mainmenu'));
    }
}
