<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\SongRessource as SongRessource;
use App\Models\Song;

class SongController extends BaseController
{
    public function index()
    {
        $songs = Song::all();
        return $this->handleResponse(SongRessource::collection($CarteBancaires), 'Carte bancaire have been retrieved!');
    }
    public function show($id)
    {
        $task = Song::find($id);
        if (is_null($task)) {
            return $this->handleError('Song not found!');
        }
        return $this->handleResponse(new SongRessource($task), 'Song retrieved.');
    }

}
