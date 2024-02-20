<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-6 shadow p-3 mb-5 bg-white rounded mt-5">
                <div class="m-3">
                    <h2>Login Form</h2>
                    <form action="{{ route('login-user') }}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                        @csrf
                        <div>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control mt-3"
                                placeholder="Email">
                            <span class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control mt-3" placeholder="Password">
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div>
                            <input type="submit" class="form-control mt-3">
                        </div>
                        <div class="text-end m-1">
                            <span style="font-size: 12px;"><i> Don't have any account</i> </span>
                            <a href="{{route('registration')}}"><i>Register</i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>