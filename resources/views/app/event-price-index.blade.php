@extends('layouts.app-main')
@section('title') Tarifs de l'évènement "{{ $event->name }}" @endsection
@section('bigTitle') Tarifs de l'évènement "{{ $event->name }}" @endsection

@section('main')
    @include('extras.success_message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des tarifs</h3>
            <div class="card-tools">
                <button class="btn btn-primary">Ajouter un tarif</button>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Libellé</th>
                  <th>Prix</th>
                  <th>Modification</th>
                  <th>Suppression</th>
                </tr>
              </thead>
              <tbody>
                @forelse($event->eventPrices as $eventPrice)
                    <tr>
                        <td>{{ $eventPrice->label }}</td>
                        <td>{{ $eventPrice->value }}</td>
                        <td>
                            <button class="btn btn-danger btn_edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span>Modifier</span>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn_destroy">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>Supprimer</span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Vous n'avez aucun tarif disponible pour cet évènement.
                        </td>
                    </tr>
                @endforelse
              </tbody>
            </table>
          </div>
    </div>

@endsection