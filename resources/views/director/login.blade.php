<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Director Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('backend/assets/img/login.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            color: #fff;
        }
    </style>
</head>

<body>

<div class="container h-100">
    <div class="row align-items-center h-100" >
        <div class="col-12 col-sm-10 col-md-6 col-lg-4 mx-auto card p-3">
            @if (session('status'))
                <div class="alert alert-success text-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger text-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('director-login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control"  placeholder="enter email">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group my-3">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control"  placeholder="enter password">
                    @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>

