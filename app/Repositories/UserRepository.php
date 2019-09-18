<?php

namespace App\Repositories;

/*
use App\Models\ {
    User
};
*/

class UserRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    //protected $model;


    /**
     * Create a new JoinedRepository instance.
     *
     * @param  \App\Models\Joined $joined
     */
    /*
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    */

    /**
     * Update user.
     *
     * @return void
     */
    public function update($request, $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->updated_at = date('Y-m-d H:i:s');        
        if (!$request->password == '') {
            $user->password = bcrypt($request->password);
        }
        $user->save(); 
    }

    /**
     * Destroy user profile.
     *
     * @return void
     */
    public function destroy($user)
    {
        $user->delete();
    }    

}

