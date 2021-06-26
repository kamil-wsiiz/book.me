@extends('layouts.app')

@section('content')
<div class="container p-md-3 p-0 text-center">
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

    <main class="mt-5">
        <div class="categories">
            <a href="{{ url('/providers') }}" class="col-12 col-md-4 mb-2 mb-md-0">
                <button type="button" class="btn w-100 h-100">{{ __('Fryzjer') }}</button>
            </a>
            <a href="{{ url('/providers') }}" class="col-12 col-md-4 mb-2 mb-md-0">
                <button type="button" class="btn w-100 h-100">{{ __('Barber') }}</button>
            </a>
            <a href="{{ url('/providers') }}" class="col-12 col-md-4">
                <button type="button" class="btn w-100 h-100">{{ __('Kosmetyczka') }}</button>
            </a>
        </div>
    </main>
</div>
@endsection
