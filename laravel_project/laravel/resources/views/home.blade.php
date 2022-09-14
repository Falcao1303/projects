@include('includes/header')
<style>

  /*colors: 
  claro: 
  #8360c3
  #ffffff
  #f3eff9
  #dacfed
  #b5a0db 
  escuro:
  #271d3b
  #ffffff
  #e9e8eb
  #bebbc4
  #7d7789 */

  body {
    background-color: #f3eff9;
  }
.form-login {
    background-color: #fff;
    border-radius: 25px;
    padding: 30px;
    margin: 0 auto;
    width: 100%;
    max-width: 400px;
}

.form-outline {
    border-bottom: 1px solid #e3e3e3;
    padding: 10px;
    margin: 0 auto;
    width: 100%;
    max-width: 400px;
}

#button{
  background-color : #b5a0db;
  color : white;
}

#logo-login{
  width: 100%; 
  max-width: 400px;
  border-radius: 5%;
}

form{
  margin-top: 20px;
}

</style>    

<body ng-app="register">
<div class="form-login"  ng-controller="loginController" > 
<!-- tag img to ../img/ blade folder -->
<img src="{{url('assets/logo_1.jpg')}}" class="img-fluid" id="logo-login"alt="Logo">
<form>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="email-login" class="form-control" ng-model="loginForm.email" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="passwordLogin" ng-model="loginForm.password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
        <label class="form-check-label" for="form2Example34"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-default btn-block mb-4" id="button" ng-click="findRegister()">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="/register">Register</a></p>
  </div>
</form>
</div>
</body>
