
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
    Customer List
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
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="customer in customers">
                                    <td>@{{customer.name}}</td>
                                    <td>@{{customer.document}}</td>
                                    <td>@{{customer.email}}</td>
                                    <td>
                                        <a class="btn btn-primary" title="Edit" ng-click="openModalEdit(customers[$index])"><i class="fa-solid fa-pencil"></i></a>
                                        <a class="btn btn-danger" tile="Delete" ng-click="deleteCustomer(customer.idcostumer)"><i class="fa-solid fa-trash-can"></i></a>
                                </tr>
                            </tbody>
                    </table>
             </div>
        </div>
    </div>
</section>
</div>      
<div class="modal fade bd-example-modal-lg" id="modalEdit"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class ="modal-header">
                <h5 class="modal-title">Edit Customer</h5>
            </div>
            <div class="card col-md-12" >
            <div class="card-body">
                        <div class="row">
                        <form>
                              <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" ng-model="editRegister.name" id="name" placeholder="Name">
                              </div>
                              <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control" ng-model="editRegister.email" id="email" placeholder="E-mail">
                              </div>
                              <div class="form-group">
                                <label for="document">Document:</label>
                                <input type="document" class="form-control" ng-model="editRegister.document" id="document" placeholder="Document">
                              </div>
                                </br>
                              <button type="submit" class="btn btn-default" id="registerCustomer" ng-click="updateCustomer()">Update</button>
                        </form>
                     </div>
                </div>
            </div>
        </div>
  </div>
</div>                      
</div>   




</body>