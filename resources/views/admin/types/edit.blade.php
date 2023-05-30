@extends('layouts.admin');
@section('page-title', 'Crea nuova tipologia')

@section('content')

      <div class="col-10 mt-5">
            <form method="POST" action="{{ route('admin.types.update', ['type' => $type->slug]) }}">
                  @csrf
                  @method('PUT')

                  <div class="form-floating mb-3">
                        <input name="type_name" type="text" class="form-control @error('type_name') is-invalid @enderror"
                              id="type_name" placeholder="Inserisci il titolo del progetto..."
                              value="{{ old('type_name', $type->type_name) }}">
                        <label for="type_name">Nome Tipologia</label>
                        @error('type_name')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>


                  <div>
                        <button class="btn btn-warning" type="submit">MODIFICA</button>
                  </div>
                  <div class="m-5">
                        <a class="btn btn-danger" href="{{ route('admin.types.index') }}">Indietro</a>
                  </div>
            </form>
      @endsection
