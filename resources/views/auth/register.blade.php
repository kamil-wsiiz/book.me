@extends('layouts.app')

@section('content')
<div id="register" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rejestracja') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="m-0">
                        @csrf

                        <div class="form-check form-check-inline">
                            <input id="type_client" name="type" v-model="type" type="radio" class="form-check-input" value="{{ App\Models\User::TYPES['client'] }}" required autocomplete="off">
                            <label class="form-check-label" for="type_client">{{ __('Klient') }}</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input id="type_provider" name="type" v-model="type" type="radio" class="form-check-input" value="{{ App\Models\User::TYPES['provider'] }}" required autocomplete="off">
                            <label class="form-check-label" for="type_provider">{{ __('Usługodawca') }}</label>
                        </div>

                        <div id="form_client" v-if="type === '{{ App\Models\User::TYPES['client'] }}'">
                            <div class="row my-2">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Imię') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="surname" class="col-md-4 col-form-label">{{ __('Nazwisko') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname">

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="form_provider" v-if="type === '{{ App\Models\User::TYPES['provider'] }}'">
                            <div class="row my-2">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Firma') }}</label>

                                <div class="col-md-6">
                                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company">

                                    @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row my-2">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Miasto') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row my-2">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Adres') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="form_rest" v-if="type === '{{ App\Models\User::TYPES['client'] }}' || type === '{{ App\Models\User::TYPES['provider'] }}'">
                            <div class="row mb-2">
                                <label for="email" class="col-md-4 col-form-label">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Powtórz hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6 offset-md-4 text-md-end text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Załóż konto') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        const registerForm = {
            type: @json(old('type'))
        }
    </script>
@endsection
