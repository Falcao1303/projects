@include('includes/header') 
<style>

#sidebar {
    background-color: #9173c9;
    height: 100%;
    display: inline-block;
    position:absolute;
    width: 100%;
    max-width: 280px
}

#sidebar-list ul li, .logo-sidebar{
    list-style-type: none;
    padding: 10px;
    color: white;
    font-size: 20px;
}

#sidebar-list ul li a, .logo-sidebar a{
    color: white;
    text-decoration: none;
}

#sidebar-list ul li a em{
    margin-right: 10px;
}

.logo-sidebar img{
    width: 100%;
    max-width: 100px;
    height: 100%;
    max-height: 70px;
    border-radius: 50%;
}

@media (max-width: 500px) {
    #sidebar {
        position: fixed;
        width: 100px;
    }
}

</style>

<div class=" p-3 text-white" id="sidebar">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper" id="sidebar-list">
            <div class="logo-sidebar">
                <img src="{{url('assets/logo_2.jpg')}}" class="simple-text">
                    Smart Ecom
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="active">
                    <a href="">
                        <em class="fa-solid fa-house"></em>Dashboard
                    </a>
                </li>
                <li>
                    <a href="">
                        <em class="fa-solid fa-user"></em>User Profile
                    </a>
                </li>
                <li>
                    <a href="">
                        <em class="fa-solid fa-pencil"></em>Register
                    </a>
                </li>
                <li>
                    <a href="">
                        <em class="fa-solid fa-shop"></em>Marketplace
                    </a>
                </li>
                <li>
                    <a href="">
                        <em class="fa-solid fa-person"></em>Customers
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>