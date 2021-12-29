<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 mt-45">
          <br><h4>Home page</h4>
          <div class="table">
            <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Hospital</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{Auth::guard('doctor')->user()->name}}</td>
                  <td>{{Auth::guard('doctor')->user()->email}}</td>
                  <td>{{Auth::guard('doctor')->user()->hospital}}</td>
                  <td>
                    <form action="{{route('doctor.logout')}}" method="post">
                      @csrf
                      <button type="submit" name="button" class="btn btn-info">logout</button>
                    </form>
                  </td>
                </tr>
                <script type="text/javascript">
                </script>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
