<?php

namespace App\Repositories;

use App\Models\ {
    Joined
};

class AdminRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * Create a new JoinedRepository instance.
     *
     * @param  \App\Models\Joined $joined
     */
    public function __construct(Joined $joined)
    {
        $this->model = $joined;
    }

    public function getData()
    {
        //return $this->model
        $query = $this->model
            ->select('id', 'user_id', 'card_id', 'number')
            //->orderBy('user_id', 'asc')->get();
            ->orderBy('user_id', 'asc');
            if(\Auth::user()->role !== 'admin') $query->where('user_id', '=', \Auth::user()->id);
            //if(auth()->user()->role !== 'admin') $query->where('user_id', '=', auth()->user()->id);
            return $query->get();
    }

    /**
     * Store post.
     *
     * @param  \App\Http\Requests\JoinedRequest $request
     * @return void
     */
    public function store($request)
    {
        $card = Joined::create($request->all());
    }  

    /**
     * Update card.
     *
     * @param  \App\Models\Joined $card
     * @return void
     */
    public function update($request, $card)
    {
        //$card->update($request->all());
        $card->user_id = $request->user_id;
        $card->card_id = $request->card_id;
        $card->number = $request->number;
        $card->save();
    }      

}

