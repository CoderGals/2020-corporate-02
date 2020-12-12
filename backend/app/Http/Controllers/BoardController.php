<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\User;

class BoardController extends Controller
{
	public function store(Request $request){
		$board = new Board;
		$board->title = $request->title;
		$board->description = $request->description;
		auth()->user()->boards()->save($board, ['role' => 'author']);
		return $board;
	}

	public function authorizeUser(Request $request, $id){
		$board = Board::find($id);
		$user = User::where('email', '=', $request->email)->first();
		$user->boards()->save($board, [
			'role' => $request->role
		]);
		return ['success' => true];
	}
}
