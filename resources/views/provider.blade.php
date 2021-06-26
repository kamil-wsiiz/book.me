@extends('layouts.app')

@section('content')

    <div id="profile-provider" class="container">
        <div class="pb-md-4">
            <p class="fs-5 text-muted text-center">{{ $provider->name }}</p>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Szczegóły') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>{{ __('Adres') }}</strong></p>
                            </div>
                            <div class="col-md-8">
                                {{ $provider->city }}, {{ __('ul.') }} {{ $provider->address }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>{{ __('Godziny otwarcia') }}</strong></p>
                            </div>
                            <div class="col-md-8">
                                {{ str_pad($provider->opening_from, 2, '0', STR_PAD_LEFT) }} - {{ str_pad($provider->opening_to, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reservation_modal">{{ __('Zarezerwuj') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="reservation_modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Rezerwowanie terminu') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="calendar text-center">
                                <div id="datepicker"></div>
                            </div>

                            <div class="dates mt-2 text-center">
                                <div class="btn-group" role="group">
                                    @for($i = $provider->opening_from; $i < $provider->opening_to; $i++)
                                        <input type="radio" class="btn-check me-2" name="hour" id="hour_{{ $i  }}" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="hour_{{ $i  }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</label>
                                    @endfor
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Anuluj') }}</button>
                        <button type="button" class="btn btn-primary">{{ __('Rezerwuję!') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
