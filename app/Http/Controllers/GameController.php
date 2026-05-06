<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;

class GameController extends Controller
{
    public function store(GameRequest $request)
    {
        $form = $request->validated();

        $game = Game::create($form);

        return response()->json([
            'message' => 'Jogo criado com sucesso',
            'data' => $game->toResource()
        ], 201);

    }

    public function index()
    {
        $games = Game::paginate(10);

        return response()->json([
            'message' => 'Lista de jogos',
            'data' => $games->toResourceCollection()
        ]);
    }

    public function show($id)
    {
        $game = Game::find($id);

        if(!$game) {
            return response()->json([
                'message' => "Jogo com ID: $id não encontrado",
            ], 404);
        }

        return response()->json([
            'message' => "Detalhes do jogo com ID: $id",
            'data' => $game->toResource()
        ]);
    }

    public function update(GameRequest $request, $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json([
                'message' => "Jogo com ID: $id não encontrado",
            ], 404);
        }

        $form = $request->validated();
        $game->update($form);

        return response()->json([
            'message' => "Jogo com ID: $id atualizado com sucesso",
            'data' => $game->toResource()
        ]);
    }

    public function destroy($id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json([
                'message' => "Jogo com ID: $id não encontrado",
            ], 404);
        }

        $game->delete();

        return response()->json([
            'message' => "Jogo com ID: $id excluído com sucesso",
            'data' => $game->toResource()
        ]);
    }
}
