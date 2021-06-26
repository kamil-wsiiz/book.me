@extends('layouts.app')

@section('content')
    <div id="profile-client" class="container">
        <div class="pb-md-4">
            <p class="fs-5 text-muted text-center">{{ Auth::user()->client->name }} {{ Auth::user()->client->surname }}</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Rezerwacje') }}</div>

                    <div class="card-body text-end">
                        @if(Auth::user()->client->reservation->isEmpty())
                            <p class="text-center m-0">{{ __('Brak rezerwacji')  }}</p>
                        @else
                            <table class="table table-align-middle text-center">
                                <thead>
                                <tr>
                                    <th scope="col">{{ __('Salon') }}</th>
                                    <th scope="col">{{ __('Usługa') }}</th>
                                    <th scope="col">{{ __('Cena') }}</th>
                                    <th scope="col">{{ __('Data') }}</th>
                                    <th scope="col">{{ __('Akcje') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach(Auth::user()->client->reservation as $reservation)
                                        <tr>
                                            <td>{{ $reservation->provider->name }}</td>
                                            <td>{{ $reservation->service->name }}</td>
                                            <td>{{ $reservation->service->price }}</td>
                                            <td>{{ $reservation->date }}</td>
                                            <td>
                                                <button class="btn btn-outline-info mx-2"><i class="bi-pencil"></i></button>
                                                <button class="btn btn-outline-danger"><i class="bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
