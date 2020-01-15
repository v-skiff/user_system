@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="leave-comment mr0"><!--leave comment-->

                        <h3 class="text-uppercase">Register</h3>
                        <br>
                        <form class="form-horizontal contact-form" role="form" method="post" action="/register">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="login" name="login"
                                           placeholder="Login" value="{{ old('login') }}">
                                    @error('login')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                           placeholder="Full name" value="{{ old('full_name') }}">
                                   @error('full_name')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="birthday" name="birthday"
                                           placeholder="Birthday" value="{{ old('birthday') }}">
                                   @error('birthday')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="Address" value="{{ old('address') }}">
                                   @error('address')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="city" name="city"
                                           placeholder="City" value="{{ old('city') }}">
                                   @error('city')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="state" name="state"
                                           placeholder="State" value="{{ old('state') }}">
                                   @error('state')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="country" name="country"
                                           placeholder="Country" value="{{ old('country') }}">
                                   @error('country')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Password">
                                       @error('password')
                                           {{ $message }}
                                       @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                           placeholder="Confirm password">
                                   @error('password_confirmation')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn send-btn">Register</button>

                        </form>
                    </div><!--end leave comment-->
                </div>
            </div>
        </div>
    </div>
@endsection
