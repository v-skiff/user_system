@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="leave-comment mr0"><!--leave comment-->
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-uppercase">My profile</h3>
                        <br>
                        <img src="assets/images/abc.jpg" alt="" class="profile-image">
                        <form class="form-horizontal contact-form" role="form" method="post" action="/profile">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="login" name="login"
                                           placeholder="Login" value="{{ $user->login }}">
                                    @error('login')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                           placeholder="Full name" value="{{ $user->full_name }}">
                                   @error('full_name')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="birthday" name="birthday"
                                           placeholder="Birthday" value="{{ $user->birthday }}">
                                   @error('birthday')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{ $user->email }}">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="Address" value="{{ $user->address }}">
                                   @error('address')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="city" name="city"
                                           placeholder="City" value="{{ $user->city }}">
                                   @error('city')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="state" name="state"
                                           placeholder="State" value="{{ $user->state }}">
                                   @error('state')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="country" name="country"
                                           placeholder="Country" value="{{ $user->country }}">
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

                            <button type="submit" class="btn send-btn">Update</button>

                        </form>
                    </div><!--end leave comment-->
                </div>
            </div>
        </div>
    </div>
@endsection
