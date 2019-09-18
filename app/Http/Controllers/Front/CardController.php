<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,  
    Repositories\CardRepository
    //Models\Type

};

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, CardRepository $repository)
    {
        $cards = $repository->getData($request);

        //$types = Type::all()->pluck('name', 'id');

        //return view('front.index', compact('cards', 'typess'));

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("front.brick-standard", ['cards' => $cards])->render(),
            ]);
        } 

        return view('front.index', compact('cards'));
    }
}
