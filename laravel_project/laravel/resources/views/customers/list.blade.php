
<style>

.dashboard-principal{
    margin-left:17%;
}

.title-screen{
    margin-bottom: 10px ;
}

#searchCustomer{
    margin-left : 10px;
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

<div class="dashborad col-md-12 col-sm-12" ng-app="customer" ng-controller="customerRegisterController">       
<div class="sidebar col-md-3">
@include('includes/sidebar')
</div>
<div class="dashboard-principal col-md-10 col-sm-10">
<h1 class="title-screen">
    Costumer List
</h1>
<section>    
    <div class="card col-md-10" >
            <div class="card-header">
                <h3 class="card-title">Filter</h3>
            </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <label for="name">Name</label></br>
                        <input class="col-md-4"type="text" ng-model="filterModel.name">
                        <a class="btn btn-primary " id="searchCustomer">Search</a>
                    </div>
             </div>
        </div>
    </div>
    <div class="card col-md-10" >
            <div class="card-header">
                <h3 class="card-title">Registers</h3>
            </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table>
                            <tr>

                            </tr>

                        </table>
                    </div>
                    <table class="table table-striped">
                    <thead>
                              <tr>
                                <th>Name</th>
                                <th>CPF</th>
                                <th>E-mail</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="customer in customers">
                                    <td>@{{customer.name}}</td>
                                    <td>@{{customer.document}}</td>
                                    <td>@{{customer.email}}</td>
                                </tr>
                            </tbody>
                    </table>
             </div>
        </div>
    </div>
</section>
</div>                            
</div>   

</body>