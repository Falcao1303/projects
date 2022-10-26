
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


.card:hover{
    box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
    cursor: pointer; 
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

<div class="dashborad col-md-12 col-sm-12"  ng-controller="dashboardController">       
<div class="sidebar col-md-3">
@include('includes/sidebar')
</div>
<div class="dashboard-principal col-md-10 col-sm-10">
<h1 class="title-screen">
    Customer Register
</h1>
<section>    

</section>
</div>                            
</div>   

</body>