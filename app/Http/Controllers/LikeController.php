<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Input;

class LikeController extends Controller
{
   public function toggleLike()
   {
   		$commentId = Input::get('commentId');
   		$comment = Comment::find($commentId);


         $usersLike= $comment->likes()->where('user_id',auth()->id())->where('likable_id',$commentId)->first();

   		if (!$comment->isLiked()) {
   			$comment->likeIt();
   			return responce()->json(['status' => 'success', 'message' => 'liked']);
   		} else {

   			$comment->unlikeIt();
   			return responce()->json(['status' => 'success', 'message' => 'unliked']);
   		}

   }
}
