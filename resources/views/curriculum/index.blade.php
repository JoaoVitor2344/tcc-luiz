@extends('layouts.app', [
    'title' => 'Currículo',
    'btnText' => 'Cadastrar currículo',
    'btnRoute' => 'curriculum.create',
    'breadCrumb' => [
        ['text' => 'Currículos'],
    ]
])

@section('content')
    <div class="row">
        @foreach($curriculums as $curriculum)
            <div class="col-sm-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-truncate">{{ $curriculum->user->name }}</h3>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $curriculum->phone }}</p>
                        <p>{{ $curriculum->user->email }}</p>
                        <a href="{{ route('curriculum.show', $curriculum->id) }}">
                            <button class="btn btn-outline-primary w-100">Visualizar</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
