@extends('layouts.app')

@section('content')
    <div id="provider" class="container p-0 text-center">
        <div class="pb-md-4">
            <p class="fs-5 text-muted">{{ __('Odkryj najlepsze salony w okolicy i umów się na wizytę online!') }}</p>
        </div>

        <div class="col-md-6 mx-auto">
            <form id="search-form" action="{{ url('/providers') }}" method="GET">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="input-group-text">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control text-truncate" name="search" placeholder="{{ __('Znajdź i zarezerwuj usługę') }}" value="{{ old('search') }}">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi-geo-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="where" placeholder="{{ __('Gdzie?') }}" value="{{ old('where') }}">
                </div>
            </form>
        </div>

        <main class="mt-4">
            <div class="col-md-8 mx-auto text-start">
                <div class="filters">
                    <div class="col-sm-6">
                        <span class="fw-bold d-block">{{ __('Kategorie') }}</span>
                        <input id="hairdresser" name="category" type="checkbox" class="form-check-input" value="hairdresser" autocomplete="off">
                        <label for="hairdresser" class="form-label mx-2">{{ __('fryzjer') }}</label>

                        <input id="barber" name="category" type="checkbox" class="form-check-input" value="barber" autocomplete="off">
                        <label for="barber" class="form-label mx-2">{{ __('barber') }}</label>

                        <input id="beautician" name="category" type="checkbox" class="form-check-input" value="beautician" autocomplete="off">
                        <label for="beautician" class="form-label mx-2">{{ __('kosmetyczka') }}</label>
                    </div>
                </div>

                <div class="providers mt-4">
                    @if ($providers->isEmpty())
                        <div class="alert alert-danger text-center" role="alert">{{ __('Nie znaleziono salonów o podanych kryteriach') }}</div>
                    @endempty

                    @foreach($providers as $provider)
                        <div class="row g-0 align-items-center border border-primary rounded p-3">
                            <div class="col">
                                <span>{{ $provider->name }}</span>
                            </div>
                            <div class="col text-end">
                                <a href="{{ url('/provider/' . $provider->id) }}">
                                    <button class="btn btn-outline-dark">{{ __('Wybierz') }}</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
@endsection
