<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;


class UserController extends Controller
{
    public function topAuthors() : JsonResponse {
        //get last week date
        $weekAgo = Carbon::now()->subWeek();
        $topAuthors = User::withCount(['articles' => function (Builder $query) use ($weekAgo) {
                $query->where('articles.created_at', '>=', $weekAgo);
            }])
            ->orderBy('articles_count', 'desc')
            ->limit(3)
            ->get();

        return response()->json(['topAuthors' => $topAuthors], 200);
    }
}
