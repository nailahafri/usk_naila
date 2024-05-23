<!DOCTYPE html>
<html lang="en" class="form-screen">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | {{ $title }}</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="css/main.css?v=1652870200386">

</head>
<body>

<div id="app">

  <section class="section main-section">
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          Login
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="/login">
          @csrf
          
          <div class="field spaced">
            <label class="label">Username</label>
            <div class="control icons-left">
              <input class="input" type="text" name="f_username" placeholder="Username" autocomplete="username">
              <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
            </div>
            <p class="help">
              Please enter your username
            </p>
          </div>

          <div class="field spaced">
            <label class="label">Password</label>
            <p class="control icons-left">
              <input class="input" type="password" name="f_password" placeholder="Password" autocomplete="current-password">
              <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
            </p>
            <p class="help">
              Please enter your password
            </p>
          </div>
          
          @if (session()->has('error')) 
              <p>{{ session('error') }}</p>
          @endif
          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button blue">
                Login
              </button>
            </div>
            <div class="control">
              <a href="/" class="button">
                Back
              </a>
            </div>
          </div>
          
        </form>
      </div>
    </div>

  </section>


</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="js/main.min.js?v=1652870200386"></script>



<noscript><img height="1" width="1" style="display:none" src="/cdn/tr.txt"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="/cdn/materialdesignicons.min.css">

</body>
</html>
