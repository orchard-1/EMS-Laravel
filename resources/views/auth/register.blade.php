@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        

                        <div class="form-group row">
                            <label for="last_name" class="col-sm-3 col-form-label">Last Name(required) :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="last_name" name="last_name" 
                                placeholder="Format:This field accepts only numbers and alphabets" value="" required
                                    aria-required="true" pattern="[0-9a-zA-z]+">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-3 col-form-label">Moblie Number (required) :</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="mobile" name="mobile" 
                                placeholder="Example: +91 9876543210" value="" required
                                    aria-required="true" pattern="\+91+\s[789][0-9]{9}+">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-sm-3 col-form-label">Date Of Birth (required) :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="dob" name="dob" required
                                    aria-required="true">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="address">Address: </label>
                            <div class="col-sm-9">
                                <textarea id="address" class="form-control" name="address" placeholder="Write something.." value=" "></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 pt-0" for="city">Choose a city:</label>
                            <div class="col-sm-9">
                                <select class="custom-select mr-sm-3" name="city" id="city">
                                    <option value="Hyderabad">Hyderabad</option>
                                    <option value="Banglore">Banglore</option>
                                    <option value="Chennai">Chennai</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Kolkata">Kolkata</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="form-group">
                            <div class="row">
                                <label class="col-form-label col-sm-3 pt-0" for="gender">Gender:</label>
                                <div class="col-sm-9">
                                    <div class="form-check-input">
                                        <input class="form-check-input" type="radio" id="male" name="gender" value="male"> Male<br>
                                        
                                        <input class="form-check-input" type="radio" id="female" name="gender" value="female">
                                        <span>Female</span><br>
                                        <input class="form-check-input" type="radio" id="other" name="gender" value="other"> Other
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
