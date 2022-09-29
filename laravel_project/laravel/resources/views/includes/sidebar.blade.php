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

#sidebar-list ul li a{
    display:inline-block;
}


#sidebar-list ul li a, .logo-sidebar a{
    color: white;
    text-decoration: none;
}

#sidebar-list ul li a em{
    margin-right: 10px;
    position:relative;
}

.option p{
    display: inline-block;
    margin-left: 10px;
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

    #sidebar-list a{
        margin-top: 10px;
        margin-left: 18px;
    }

    .option p{
    display: none;
    }

    .logo-sidebar img{
    width: 100%;
    max-width: 100px;
    height: 100%;
    max-height: 37px;
    border-radius: 50%;
    }

    .logo-sidebar p{
        display: none;
    }

    .responsive-side-bar{
        position: absolute;
        left: 10%;
        left: 21%;
        top: 3%;
    }

    .responsive-side-bar button{
        border-radius: 50%;
        background-color: #9173c9;
        border: none;
    }

    .responsive-side-bar button i{
        width: 23px;
        height: 16px;
        color: white;
        margin: 6px 1px;
    }
}

</style>

<div class=" p-3 text-white" id="sidebar">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper" id="sidebar-list">
            <div class="logo-sidebar">
                <img src="{{url('assets/logo_2.jpg')}}" class="simple-text" alt="Logo">
                   <p>Smart Ecom</p>
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="option">
                    <a href="" title="Dashboard">
                        <em class="fa-solid fa-house"></em><p>Dashboard</p>
                    </a>
                </li>
                <li class="option">
                    <a href="" title="User Profile">
                        <em class="fa-solid fa-user"></em><p>User Profile</p>
                    </a>
                </li>
                <li class="option" title="Register">
                    <a href="">
                        <em class="fa-solid fa-pencil"></em><p>Register</p>
                    </a>
                </li>
                <li class="option">
                    <a href="" title="MarketPlace">
                        <em class="fa-solid fa-shop"></em><p>Marketplace</p>
                    </a>
                </li>
                <li class="option">
                    <a href="" title="Customers">
                        <em class="fa-solid fa-person"></em><p>Customers</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="responsive-side-bar">
<button>
<i class="fa-sharp fa-solid fa-list"></i>
</button>
</div>