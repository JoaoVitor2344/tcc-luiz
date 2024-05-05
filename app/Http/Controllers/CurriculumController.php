<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\User;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::all();

        return view('curriculum.index', compact('curriculums'));
    }

    public function show($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        return view('curriculum.show', compact('curriculum'));
    }

    public function create()
    {
        if (!auth()->user()->can('curriculum.create')) {
            abort(403);
        }

        $users = auth()->user()->hasRole('user') ? auth()->user() : User::wherehas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('curriculum.create', compact('users'));
    }
}
