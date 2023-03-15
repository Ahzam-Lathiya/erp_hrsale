@extends('layout.guest')

@section('main')

<form id="login_form" action="{{ route('login.authenticate') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <h1 class="h3 mb-3 fw-normal">Sign in</h1>

  <div class="form-floating">
    <input type="text" name="name" class="form-control" id="floatingInput">
    <label for="floatingInput">User ID</label>
  </div>
  <div class="form-floating">
    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button id="form_submit_button" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
</form>

<p class="mt-5 mb-3 text-muted">Don't have an account. Register Below</p>
<button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
<p class="mt-5 mb-3 text-muted">© 2023</p>


<script>

  // var controller = new AbortController();
  // var signal_obj = controller.signal;

  // var form_timeout_flag = false;

  // function reset_controller()
  // {
  //   controller = new AbortController();
  //   signal_obj = controller.signal;
  // }


  // async function post_fetch(url, data)
  // {
  //     let timeout_flag = false;

  //     start_api_timer(5000, timeout_flag);

  //     let options = {
  //       method: 'POST',
  //       body: data,
  //       signal: signal_obj
  //     };



  //     let promise = await fetch(url, options);

  //     let response = await promise.json();

  //     return response;
  // }

  // function start_api_timer(duration, flag)
  // {
  //     setTimeout(function(){
  //         if(flag)
  //         {
  //           abort_controller();
  //         }
  //     }, duration);
  // }

  let form = document.querySelector('#login_form');



  document.querySelector('#form_submit_button').addEventListener('click', function(){
    event.preventDefault();

    let form_obj = new FormData( form );

    let form_fetcher = FetchClass;

    form_fetcher.set_payload(form_obj);
    form_fetcher.set_url(form.action);
    form_fetcher.set_headers();

    form_fetcher.call_request(
      function(response){
        console.log(response);
        if(response.status != 'true')
        {
          alert("Something is not right");
          return;
        }

        location.href = response.redirect_url;
      },
      function(error){
        console.warn(error);
      },
      'post'
    );
  });
  </script>

@endsection

