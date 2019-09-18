<?php

namespace App\Repositories;

use App\Models\ {
    Card
};

class CardRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * Create a new CardRepository instance.
     *
     * @param  \App\Models\Card $card
     */
    public function __construct(Card $card)
    {
        $this->model = $card;
    }

    /**
     * Get types collection
     *
     * @return Illuminate\Database\Eloquent\Collection Object
     */
    public function getData($request)
    {
        $query = $this->model
            ->select('id', 'type_id', 'name', 'title')
            ->orderBy('type_id', 'desc')
            ->whereHas('type', function ($q) use ($request) {  
                if($request->type) $q->where('type_id', '=', $request->type);
            })->get();       
        //if($request->type) $query = $query->where('type_id', '=', $request->type)->get();
        //else $query = $query->get();
        
        return $query;      
    }

}
