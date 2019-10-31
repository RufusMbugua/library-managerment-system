<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Games;

class GameController extends Controller
{
    public function index()
    {
        $games = Games::orderBy('id', 'desc')->paginate(7);

        return \View::make('games.index')->with('games', $games);
    }

    public function add(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|unique:games,name',
            'publisher' => 'required',
            'price' => 'required|integer',
            'number_of_copies' => 'required|integer|',
        ));

        $game = new Games();
        $game->create($request->all());

        return \Redirect::to(route('games'));
    }

    public function editGameView($id)
    {
        $game_info = Games::where('id', $id)->first();

        return \View::make('games.edit')
      ->with('game_info', $game_info);
    }
    public function editGame(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|unique:games,name',
            'name' => 'required',
            'price' => 'required|integer',
            'number_of_copies' => 'required|integer|',
            'id' => 'required',
        ));

        Games::where('id', $request->id)->update(array(
            'name' => $request->name,
            'publisher' => $request->publisher,
            'price' => $request->price,
            'number_of_copies' => $request->number_of_copies,
        ));

        return \Redirect::to(url('/book/'.$request->id));
    }

    public function view($id)
    {
        $game = Games::where('id', $id)->first();
        if($game){

        $borrows = \App\Borrows::where('book_id', $game->id)->paginate(5);

        return \View::make('games.view')
      ->with('book', $game)
      ->with('borrows', $borrows);
  }else{
      return \Redirect::to('/');

  }
    }

    public function deleteGame($id)
    {
        return \View::make('games.delete')->with('id', $id);
    }
}
