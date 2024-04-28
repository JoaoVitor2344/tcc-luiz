<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
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
}
