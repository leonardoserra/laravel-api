@extends('layouts.admin');
@section('page-title', 'Interfaccia delle Tipologie')

@section('content')

      <div class="col-10">
            <div class="m-5">
                  <a class="btn btn-success" href="{{ route('admin.types.create') }}">Crea Nuova Tipologia</a>

            </div>
            <table class="table">
                  <thead>
                        <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Slug</th>
                              <th scope="col">Conteggio</th>
                              <th scope="col">Azione</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($types as $type)
                              <tr>
                                    <th scope="row">{{ $type->id }}</th>
                                    <td>{{ $type->type_name }}</td>
                                    <td>{{ $type->slug }}</td>
                                    <td>{{ count($type->projects) }}</td>



                                    <td class="d-flex align-items-start">

                                          <a class="btn btn-warning ms-2 me-2"
                                                href="{{ route('admin.types.edit', ['type' => $type->slug]) }}">Modifica</a>
                                          <form class="form_delete_type"
                                                action="{{ route('admin.types.destroy', ['type' => $type->slug]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Elimina</button>
                                          </form>
                                    </td>
                              </tr>
                        @endforeach
                  </tbody>
            </table>

      </div>

      {{-- sezione modale --}}
      <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              Sicuro di voler eliminare la tipologia?
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                              <button type="button" class="btn btn-danger">Conferma eliminazione</button>
                        </div>
                  </div>
            </div>
      </div>
@endsection
