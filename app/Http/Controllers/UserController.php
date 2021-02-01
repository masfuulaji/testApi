<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function show()
    {
        try {
            $user = User::all();
            return response()->json(['error' => false, 'data' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function page(Request $request)
    {
        try {
            Paginator::currentPageResolver(fn () => $request->current_page);
            $user = User::select($request->select)
                ->where([
                    $request->where
                ])
                ->paginate($request->limit);
            $user->setCollection($user->sortByDesc($request->sort_by_desc));
            return response()->json(['error' => false, 'data' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
