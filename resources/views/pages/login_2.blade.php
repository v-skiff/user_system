@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="leave-comment mr0"><!--leave comment-->
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-uppercase">Email verifiction code</h3>
                        <br>
                        <form class="form-horizontal contact-form" role="form" method="post" action="/login_2">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="code" name="code"
                                           placeholder="Code">
                                   @error('code')
                                       {{ $message }}
                                   @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn send-btn">Submit</button>

                        </form>
                    </div><!--end leave comment-->
                </div>
            </div>
        </div>
    </div>
@endsection
