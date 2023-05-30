@extends('layouts.admin')
@section('page-title', $project->title)

@section('content')
      <div class="col-10">
            <div class="card">
                  <div class="card-body">
                        <div>
                              @foreach ($project->technologies as $technology)
                                    <span class="badge rounded-pill text-bg-primary">{{ $technology->name }}</span>
                              @endforeach
                        </div>
                        @if ($project->image_src)
                              <img style="width: 35%" src="{{ $project->image_src }}" class="card-img-top"
                                    alt="{{ $project->title }}">
                        @endif
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <h6 class="card-text">
                              Tipologia:
                              {{ $project->type_id ? $project->type->type_name : 'Nessuna Tipologia Di Progetto Selezionata' }}
                              </h5>
                              <p class="card-text">
                                    {{ $project->description }}</p>
                              <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}"
                                    class="btn btn-primary">Modifica</a>
                  </div>
            </div>
      </div>
@endsection
