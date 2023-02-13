<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>register</title>
</head>

<body>


    {{-- success message --}}


    <div class="container">
        <div class="row">
            <div class="col-md-4">





                <p>Register a new membership</p>
                <form action="{{ url('admin/register')}}" method="POST" class="form-group">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="name">
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                    <input type="txet" name="email" class="form-control" placeholder="email">
                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                    <input type="text" name="phone" class="form-control" placeholder="phone">
                    @error('phone')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                    <input type="password" name="password" class="form-control" placeholder="password">
                    @error('password')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="password_confirmation">
                        @error('password_confirmation')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    <div>
                    <input type="submit" name="register" class="btn btn-success" value="register">
                    </div>
                    <div>
                        <a href={{route("admin.login")}}>login page</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
