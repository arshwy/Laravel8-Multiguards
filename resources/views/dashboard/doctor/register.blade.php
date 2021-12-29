<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Doctor Register</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 mt-45">
          <br><h4>Doctor Register</h4><hr>
            <form class="" action="{{route('doctor.create')}}" method="post">
              @csrf
              @if(Session::get('success'))
                <div class="alert alert-success">
                  {{Session::get('success')}}
                </div>
              @endif
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="enter">
                <span class="text text-danger">@error('name'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="enter">
                <span class="text text-danger">@error('email'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label for="email">Hospital Name</label>
                <input type="text" name="hospital" value="{{old('hospital')}}" class="form-control" placeholder="enter">
                <span class="text text-danger">@error('hospital'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="enter">
                <span class="text text-danger">@error('password'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" placeholder="enter password again">
                <span class="text text-danger">@error('confirm_password'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary">Register</button>
              </div>
              <div class="form-group">
                <a href="{{route('doctor.login')}}">I have already an account</a>
              </div>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
