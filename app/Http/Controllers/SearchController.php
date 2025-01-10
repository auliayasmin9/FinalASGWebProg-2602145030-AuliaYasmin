<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = User::query();

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('hobby')) {
            $query->where('hobbies', 'LIKE', '%'.$request->hobby.'%');
        }

        $users = $query->get();
        return view('search', compact('users'));
    }
}

