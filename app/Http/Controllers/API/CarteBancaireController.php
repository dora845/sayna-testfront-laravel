<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CarteBancaire as CarteBancaireRessource;
use App\Models\CarteBancaire;
use Validator;


class CarteBancaireController extends BaseController
{

    public function index()
    {
        $CarteBancaires = CarteBancaire::all();
        return $this->handleResponse(CarteBancaireRessource::collection($CarteBancaires), 'Carte bancaire have been retrieved!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'month' => 'required',
            'year' => 'required'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $cartebancaire = CarteBancaire::create($input);
        return $this->handleResponse(new CarteBancaireRessource($cartebancaire), 'Task created!');
    }


    public function show($id)
    {
        $task = CarteBancaire::find($id);
        if (is_null($task)) {
            return $this->handleError('Task not found!');
        }
        return $this->handleResponse(new CarteBancaireRessource($task), 'Task retrieved.');
    }


    public function update(Request $request, CarteBancaire $task)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'month' => 'required',
            'year' => 'required'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $task->name = $input['month'];
        $task->details = $input['year'];
        $task->save();

        return $this->handleResponse(new CarteBancaireRessource($task), 'Task successfully updated!');
    }

    public function destroy(CarteBancaire $task)
    {
        $task->delete();
        return $this->handleResponse([], 'Task deleted!');
    }
}
