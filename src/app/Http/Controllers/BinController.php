<?php

namespace App\Http\Controllers;

use App\Bin;
use App\Events\BinAdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class BinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $objUser = Auth::user();
        $bins = $objUser->bins;

        return view('bins.index', compact('bins'));
    }

    public function show($id)
    {
        $objBin = Bin::where('uuid',$id)->first();
        if (!is_object($objBin)) {
            $message = "not found";
            return view('errors.index', compact('message'));
        }

        $objBinItems = $objBin->binItems;
        return view('bins.show',compact('objBin', 'objBinItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $objUser = Auth::user();

        $input['uuid'] = Uuid::uuid4()->toString();
        $objBin = $objUser->bins()->create($input);

        event(new BinAdd($objBin));

        return redirect()->route('bins.index');
    }

    public function vueIndex()
    {
        $objUser = Auth::user();
        return view('bins.vue-index', compact('objUser'));
    }

    public function vueShow($id)
    {
        $objBin = Bin::where('uuid',$id)->first();
        if (!is_object($objBin)) {
            $message = "not found";
            return view('errors.index', compact('message'));
        }

        return view('bins.vue-show', compact('objBin'));
    }
}
