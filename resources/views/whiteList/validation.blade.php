@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Walidacja czynnego płatnika VAT') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/validation">
                            @csrf

                            <div class="form-group row">
                                <label for="nip" class="col-md-4 col-form-label  {{--@error('email') is-invalid @enderror--}} text-md-right">{{ __('NIP') }}</label>

                                <div class="col-md-6">
                                    <input id="nip" type="number" class="form-control" name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus>

                                    @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="iban" class="col-md-4 col-form-label text-md-right">{{ __('Nr konta') }}</label>

                                <div class="col-md-6">
                                    <input id="iban" type="password" class="form-control @error('iban') is-invalid @enderror" name="iban" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Waliduj') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
