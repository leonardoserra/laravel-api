@extends('layouts.admin')
@section('page-title', 'Crea un nuovo Project')

@section('content')
      <div class="col-10 mt-5">
            <form method="POST" action="{{ route('admin.projects.store') }}">
                  @csrf

                  <div class="form-floating mb-3">
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                              id="title" placeholder="Inserisci il titolo del progetto..." value="{{ old('title') }}">
                        <label for="title">Titolo</label>
                        @error('title')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>

                  <div class="form-floating mb-3">
                        <input name="image_src" type="text" class="form-control @error('image_src') is-invalid @enderror"
                              id="image_src" placeholder="Inserisci un url valido per l'immagine..."
                              value="{{ old('image_src') }}">
                        <label for="image_src">Url Immagine</label>
                        @error('image_src')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>

                  <div class="form-floating mb-3">
                        <select class="form-select @error('type_id') is-invalid  @enderror" name="type_id" id="type_id">
                              <option @selected(old('type_id') == '') value="">Nessuna Tipologia Assegnata</option>

                              @foreach ($types as $type)
                                    <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->type_name }}
                                    </option>
                              @endforeach
                        </select>
                        <label for="type_id">Tipologia Project</label>
                        @error('type_id')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>

                  <div class="form-floating mb-3">
                        <input name="description" type="text"
                              class="form-control @error('description') is-invalid @enderror" id="description"
                              placeholder="Inserisci il titolo del progetto" value="{{ old('description') }}">
                        <label for="description">Descrizione</label>
                        @error('description')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>

                  <div class="mb-3">
                        <div class="mb-3">Seleziona le tecnologie usate:</div>
                        <div class="btn-group">
                              @foreach ($technologies as $technology)
                                    <input type="checkbox" class="btn-check" @if (in_array($technology->id, old('technologies', []))) checked @endif
                                          name="technologies[]" value="{{ $technology->id }}"
                                          id="technology_{{ $technology->id }}">
                                    <label class="btn btn-outline-primary"
                                          for="technology_{{ $technology->id }}">{{ $technology->name }}</label>
                              @endforeach

                              @error('technologies')
                                    <div class="invalid-feedback">
                                          {{ $message }}
                                    </div>
                              @enderror
                        </div>
                  </div>

                  <div>
                        <button class="btn btn-success" type="submit">CREA</button>
                  </div>
            </form>

      </div>
@endsection
