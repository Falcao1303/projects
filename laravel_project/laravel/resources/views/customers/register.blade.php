
<style>

.dashboard-principal{
    margin-left:17%;
}

.title-screen{
    margin-bottom: 10px ;
}

.card{
    padding: 0px;
    width: 290px;
    margin: 10px 10px;
}


@media (max-width: 1500px){
    .dashboard-principal{
    margin: auto 35%;
    }
    .title-screen{
    padding: 10px; 
    }    
}


</style>
@include('includes/scripts')

<div class="dashborad col-md-12 col-sm-12" ng-app="customer" ng-controller="customerRegisterController">       
<div class="sidebar col-md-3">
@include('includes/sidebar')
</div>
<div class="dashboard-principal col-md-10 col-sm-10">
<h1 class="title-screen">
    Customer Register
</h1>
<section>    
    <div class="container">
            <form>
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" ng-model="customerData.name" id="name" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" ng-model="customerData.email" id="email" placeholder="E-mail">
              </div>
              <div class="form-group">
                <label for="document">Document:</label>
                <input type="document" class="form-control" ng-model="customerData.document" id="document" placeholder="CPF">
              </div>
                </br>
              <button type="submit" class="btn btn-default" id="registerCustomer" ng-click="saveCustomerRegister()">Register</button>
            </form>
    </div>
</section>
</div>                            
</div>   

</body>