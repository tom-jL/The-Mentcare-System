<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function openTab(Request $request, $id)
    {
        $tabs = session()->get('tabs');
        return redirect()->route($tabs[$id]['route']);
    }

    public function closeTab(Request $request, $id)
    {
        $tabs = session()->get('tabs');
        //error_log(json_encode($tabs));
        unset($tabs[$id]);
        session()->pull('tabs');
        session()->put('tabs', $tabs);
        return redirect()->route($tabs[$id-1]['route']);
    }

    //TODO create new tab function
}
