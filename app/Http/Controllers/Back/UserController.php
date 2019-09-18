<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Repositories\UserRepository,
    Http\Requests\UserRequest
    //Models\User    

};

class UserController extends Controller
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
    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth')->only('editprofile', 'updateprofile', 'destroyprofile');
        $this->repository = $repository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editprofile()
    {
       return view('back.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(UserRequest $request)
    {
        $this->repository->update($request, auth()->user());
        return redirect(route('editprofile'))->with('user-updated', __('User has been successfully updated'));
    }

    /**
     * Remove(and destroy) the card from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyprofile()
    {
        //$this->repository->destroy(auth()->user());
        auth()->user()->delete();

        return redirect(route('home'));
    }            

}

