
@include('includes/header')
<style>
  #button{
  background-color : #b5a0db;
  color : white;
  border : none;
}
</style>

<!-- MDB -->

<section ng-app="register" class="vh-100" style="background-color: #f3eff9;">
  <div ng-controller="registerController" class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4">
                <input type="hidden" ng-model="token" name="_token" >
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 mt-3 fa-fw"></i>
                    <div class="mb-0">
                    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                    <input type="name" class="form-control" id="exampleFormControlInput1" ng-model="registerForm.name" placeholder="Full Name">
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 mt-3 fa-fw"></i>
                    <div class="mb-0">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" ng-model="registerForm.email" placeholder="name@example.com">
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 mt-3 fa-fw"></i>
                    <div class="mb-0">
                      <label for="exampleFormControlInput1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleFormControlInput1" ng-model="registerForm.password" placeholder="Password">
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 mt-3 fa-fw"></i>
                    <div class="mb-0">
                    <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" ng-model="registerForm.password_confirmation" placeholder="Confirm password">
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" ng-model="registerForm.terms"id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4" >
                    <button type="button" id="button" ng-click="saveRegister()" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>