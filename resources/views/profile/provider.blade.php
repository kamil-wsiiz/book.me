@extends('layouts.app')

@section('content')
    <div id="profile-provider" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profil') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('profile/save_provider') }}" class="m-0">
                            @csrf

                            @isset($message_profile)
                                <div class="alert alert-success">{{ $message_profile }}</div>
                            @endif

                            <div class="row mb-2">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Kategorie') }}</label>

                                <div class="col-md-8 my-auto">
                                    <div class="input-group">
                                        <div>
                                            <input id="hairdresser" name="category" type="checkbox" class="form-check-input" value="hairdresser" autocomplete="off">
                                            <label for="hairdresser" class="form-label mx-2">{{ __('fryzjer') }}</label>
                                        </div>

                                        <div>
                                            <input id="barber" name="category" type="checkbox" class="form-check-input" value="barber" autocomplete="off">
                                            <label for="barber" class="form-label mx-2">{{ __('barber') }}</label>
                                        </div>

                                        <div>
                                            <input id="beautician" name="category" type="checkbox" class="form-check-input" value="beautician" autocomplete="off">
                                            <label for="beautician" class="form-label mx-2">{{ __('kosmetyczka') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Godziny otwarcia') }}</label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text ">{{ __('od') }}</span>
                                        <input type="number" name="opening_from"  min="0" max="24" @keypress="isNumber($event)" class="form-control @error('opening_from') is-invalid @enderror" value="{{ Auth::user()->provider->opening_from }}">
                                        <span class="input-group-text">{{ __('do') }}</span>
                                        <input type="number" name="opening_to" min="0" max="24" @keypress="isNumber($event)" class="form-control @error('opening_to') is-invalid @enderror" value="{{ Auth::user()->provider->opening_to }}">

                                        @if ($errors->hasAny('opening_from', 'opening_to'))
                                            {!! implode('', $errors->all('<span class="invalid-feedback" role="alert"><strong>:message</strong></span>')) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="publish" class="col-md-4 col-form-label">{{ __('Publikuj salon') }}</label>

                                <div class="col-md-8 my-auto">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="publish" id="publish" class="form-check-input" value="1" {{ Auth::user()->provider->publish ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-8 offset-md-4 text-md-end text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Zapisz zmiany') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">{{ __('Usługi') }}</div>

                    <div class="card-body text-end">
                        <table class="table table-align-middle text-center">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('#') }}</th>
                                <th scope="col" class="">{{ __('Nazwa') }}</th>
                                <th scope="col">{{ __('Cena') }}</th>
                                <th scope="col">{{ __('Akcje') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Strzyżenie damskie</td>
                                <td>100</td>
                                <td>
                                    <button class="btn btn-outline-info mx-2"><i class="bi-pencil"></i></button>
                                    <button class="btn btn-outline-danger"><i class="bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Strzyżenie męskie</td>
                                <td>50</td>
                                <td>
                                    <button class="btn btn-outline-info mx-2"><i class="bi-pencil"></i></button>
                                    <button class="btn btn-outline-danger"><i class="bi-trash"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <button class="btn btn-success">{{ __('Dodaj usługę') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
