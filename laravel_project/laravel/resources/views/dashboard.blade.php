
<style>

.dashboard-principal{
    margin-left:17%;
}

.title-dash{
    margin-bottom: 10px ;
}

.card{
    padding: 0px;
    width: 290px;
    margin: 10px 10px;
}


.card:hover{
    box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
    cursor: pointer; 
}

@media (max-width: 1500px){
    .dashboard-principal{
    margin: auto 35%;
    }
    .title-dash{
    padding: 10px; 
    }    
}


</style>
@include('includes/scripts')
<body ng-app="dashboard">
<div class="dashborad col-md-12 col-sm-12"  ng-controller="dashboardController">       
<div class="sidebar col-md-3">
@include('includes/sidebar')
</div>
<div class="dashboard-principal col-md-10 col-sm-10">
<h1 class="title-dash">
    Dashboard
</h1>
<section>    
    <div class="row">
        <div class="col-md-3 col-sm-6" style="width: 19%;">
            <div class="card" ng-click="openRegisterUser();">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <div class="col-md-8 col-sm-8" >
                            <h3>Customers Register</h3>
                            <p>10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6" style="width: 19%;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3>Customers Online</h3>
                            <p>10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6" style="width: 19%;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3>Sales</h3>
                            <p>10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6" style="width: 19%;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3>Reported Problems</h3>
                            <p>10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>                            
</div>   

</body>