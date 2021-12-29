<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Doctor Login</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 mt-45">
          <br><h4>Doctor Login</h4><hr>
            <form action="{{ route('doctor.check') }}" method="post">
              @csrf
              @if(Session::get('fail'))
                <div class="alert alert-danger">
                  {{Session::get('fail')}}
                </div>
              @endif
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="enter">
                <span class="text text-danger">@error('email'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="enter">
                <span class="text text-danger">@error('password'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary">Login</button>
              </div>
              <div class="form-group">
                <a href="{{route('doctor.register')}}">Create account</a>
              </div>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
