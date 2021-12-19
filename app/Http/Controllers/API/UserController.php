<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\UserRessource as UserRessource;
use App\Models\User;

use Validator;


class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->handleResponse(UserRessource::collection($users), 'users have been retrieved!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $task)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'firstname' => 'required',
            'lastname' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $task->firstname = $input['firstname'];
        $task->lastname = $input['lastname'];
        $task->dateNaissance = $input['dateNaissance'];
        $task->sexe = $input['sexe'];
        $task->role = $input['role'];
        $task->email = $input['email'];
        $task->password = bcrypt($input['password']);
        $task->save();

        return $this->handleResponse(new UserRessource($task), 'user successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $task)
    {
        $task->delete();
        return $this->handleResponse([], 'User deleted!');
    }
}
