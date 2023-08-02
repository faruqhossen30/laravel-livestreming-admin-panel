<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\User;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function blockList(Request $request)
    {
        $blocks = Block::where('user_id', $request->user()->id)->pluck('block_id')->toArray();
        $users = User::whereIn('id', $blocks)->withCount('followers')->paginate();
        return response()->json($users);
    }

    public function block(Request $request)
    {
        $request->validate([
            'block_id' => 'required'
        ]);
        $follow = Block::where('user_id', $request->user()->id)
            ->where('block_id', $request->block_id)
            ->first();

        // return $likecheck;
        if ($follow) {
            return response()->json([
                'message' => 'Already blocked.'
            ], 422);
        } else {
            $block = Block::create([
                'user_id' => $request->user()->id,
                'block_id' => $request->block_id
            ]);
            return response()->json([
                'message' => 'Block successfull !',
                'data' => $block
            ]);
        }
    }

    public function unBlock(Request $request)
    {
        $request->validate([
            'block_id' => 'required'
        ]);

        $block = Block::where('user_id', $request->user()->id)
            ->where('block_id', $request->block_id)
            ->first();

        // return $likecheck;
        if ($block) {
            $block->delete();
            return response()->json([
                'message' => 'Unblock successfull.'
            ]);
        } else {
            return response()->json([
                'message' => 'Ops ! Something went wrong'
            ], 422);
        }
    }
}
