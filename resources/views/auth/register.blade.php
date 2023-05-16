@extends('auth.app')
@section('content')
  <div class="row mt-5 border border-primary">
    <div class="col-md-5 bg-white m-auto d-flex flex-column align-content-center">
      <div class="row px-5">
        <div class="col-12 mt-5 d-flex justify-content-between">
            <a href="/login" class="btn btn-primary mb-3">LOGIN</a>
            <a href="/register" class="btn btn-primary mb-3">REGISTER</a>
        </div>

        <div class="mb-3 d-flex justify-content-center fw-bold">Register</div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
          
        <div class="col-12">
          <!-- logon form Code -->
          <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
              <input type="email" name="email" class="form-control"  placeholder="Email">
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control"  placeholder="Password">      
            </div>
            <div class="mb-3">
              <input type="password" name="password_confirmation" class="form-control"  placeholder="Repeat password">      
            </div>
            <div class="mb-3 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary mb-3">REGISTER</button>     
            </div>
          </form>    
          <!-- End login form Code -->
        </div>
      </div>
    </div>
        
  </div>
    
  <script>
    $(document).ready(function() {
      $('#registerForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
          url: $(this).attr('action'),
          type: $(this).attr('method'),
          data: $(this).serialize(),
          success:function(data){
            console.log(data)
            window.location = "/login"
          }
        });
      });
    });
  </script>
@section
