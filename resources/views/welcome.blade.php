<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
    <!-- Just an image -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <!-- <img  width="30" height="30" alt=""> -->
    <h1 class="text-center">Url Shorter</h1>
  </a>
</nav>
<div class="container">
    <div class="card">
      <div class="card-header">
        <form id="url_generater_form">
            <div class="input-group mb-3">
              <input type="text" name="url" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" id="url_generate_btn" type="button" data-url="{{route('url.store')}}">Generate short url</button>
              </div>
            </div>
            <span class="text-danger" id="url_msg"></span>

        </form>
      </div>
      <div class="card-body">
   
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Url</th>
                        <th>Short Url</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($urls as $url)
                  <tr>
                  <td>{{ $url->id }}</td>
                  <td>{{ $url->url }}</td>
                  <td>{{ $url->token }}</td>
                  </tr>
                  
                  @endforeach
                   
                </tbody>
            </table>
      </div>
    </div>
   
</div>
    
</body>
</html>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootbox.min.js') }}"></script>
<script src="{{ asset('page-js/url-generator.js') }}"></script>