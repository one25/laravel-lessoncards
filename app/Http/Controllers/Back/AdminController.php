<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Repositories\AdminRepository,
    Http\Requests\JoinedRequest,
    Models\Joined    

};

class AdminController extends Controller
{
    /**
     * The AdminRepository instance.
     *
     * @var \App\Repositories\AdminRepository
     */
    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $repository)
    {
        //$this->middleware('auth'); 
        $this->middleware('admin')->only('create', 'store', 'edit', 'update', 'destroy');
        $this->repository = $repository;
    }

    /**
     * Display a listing of the cards of users and types.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cards = $this->repository->getData();

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("back.brick-standard", ['cards' => $cards])->render(),
            ]);
        } 

        return view('back.index', compact('cards'));
    }

     /**
     * Show the form for creating a new card.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.cards.create');
    }

    /**
     * Store a newly created card in storage.
     *
     * @param  \App\Http\Requests\JoinedRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JoinedRequest $request)
    {
        $this->repository->store($request);

        return redirect(route('cards.create'))->with('card-ok', __('The card has been successfully created'));
    }        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joined $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Joined $card)
    {
       return view('back.cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\JoinedRequest $request
     * @param  \App\Models\Joined $card
     * @return \Illuminate\Http\Response
     */
    public function update(JoinedRequest $request, Joined $card)
    {
        //$this->authorize('manage', $card);

        $this->repository->update($request, $card);

        return redirect(route('dashboard'))->with('card-updated', __('The card has been successfully updated'));
    }

    /**
     * Remove the card from storage.
     *
     * @param  \App\Models\Joined $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joined $card)
    {
        $this->authorize('manage', $card);

        $card->delete();

        return response()->json();
    }                

}

