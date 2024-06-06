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

    public function store(Request $request)
    {
        if (!auth()->user()->can('curriculum.create')) {
            abort(403);
        }

        $data = $request->validate([
            'user' => 'required|exists:users,id',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'skill' => 'array',
            'skill.*' => 'string|nullable',
            'level' => 'array',
            'level.*' => 'string|nullable',
            'company' => 'array',
            'company.*' => 'string|nullable',
            'position' => 'array',
            'position.*' => 'string|nullable',
            'start_date' => 'array',
            'start_date.*' => 'date|nullable',
            'end_date' => 'array',
            'end_date.*' => 'date|nullable',
            'course' => 'array',
            'course.*' => 'string|nullable',
            'institution' => 'array',
            'institution.*' => 'string|nullable',
            'status' => 'array',
            'status.*' => 'integer|nullable',
            'certification' => 'array',
            'certification.*' => 'string|nullable',
            'date' => 'array',
            'date.*' => 'date|nullable',
            'language' => 'array',
            'language.*' => 'string|nullable',
            'hobby' => 'array',
            'hobby.*' => 'string|nullable',
        ]);

        $curriculum = Curriculum::create([
            'user_id' => $data['user'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip_code' => $data['zip_code'],
        ]);

        if (!empty($data['skill'])) {
            foreach ($data['skill'] as $index => $skill) {
                if ($skill) {
                    Skill::create([
                        'curriculum_id' => $curriculum->id,
                        'skill' => $skill,
                        'level' => $data['level'][$index] ?? null,
                    ]);
                }
            }
        }

        if (!empty($data['company'])) {
            foreach ($data['company'] as $index => $company) {
                if ($company) {
                    Experience::create([
                        'curriculum_id' => $curriculum->id,
                        'company' => $company,
                        'position' => $data['position'][$index] ?? null,
                        'start_date' => $data['start_date'][$index] ?? null,
                        'end_date' => $data['end_date'][$index] ?? null,
                    ]);
                }
            }
        }

        if (!empty($data['course'])) {
            foreach ($data['course'] as $index => $course) {
                if ($course) {
                    Education::create([
                        'curriculum_id' => $curriculum->id,
                        'course' => $course,
                        'institution' => $data['institution'][$index] ?? null,
                        'status' => $data['status'][$index] ?? null,
                        'start_date' => $data['start_date'][$index] ?? null,
                        'end_date' => $data['end_date'][$index] ?? null,
                    ]);
                }
            }
        }

        if (!empty($data['certification'])) {
            foreach ($data['certification'] as $index => $certification) {
                if ($certification) {
                    Certification::create([
                        'curriculum_id' => $curriculum->id,
                        'certification' => $certification,
                        'institution' => $data['institution'][$index] ?? null,
                        'date' => $data['date'][$index] ?? null,
                    ]);
                }
            }
        }

        if (!empty($data['language'])) {
            foreach ($data['language'] as $index => $language) {
                if ($language) {
                    Language::create([
                        'curriculum_id' => $curriculum->id,
                        'language' => $language,
                        'level' => $data['level'][$index] ?? null,
                    ]);
                }
            }
        }

        if (!empty($data['hobby'])) {
            foreach ($data['hobby'] as $index => $hobby) {
                if ($hobby) {
                    Hobby::create([
                        'curriculum_id' => $curriculum->id,
                        'hobby' => $hobby,
                    ]);
                }
            }
        }

        return redirect()->route('curriculum.index')->with('success', 'Currículo criado com sucesso!');
    }

}
