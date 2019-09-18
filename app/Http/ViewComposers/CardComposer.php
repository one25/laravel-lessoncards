<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Card;

class CardComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('types', Card::select('id', 'name')->get());
    }
}
