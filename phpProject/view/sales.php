<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
<?php include("includes/header.php"); ?>

  <body class="bg-light" ng-app="sales">
   
<div class="container" style='margin-left:200px;' ng-controller = "salesController" >
  <main >
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/img/cart.png" alt="" width="100" height="100">
      <h2>Sales Register</h2>
      <p class="lead">Welcome to sale system, below you can do your sale</p>
    </div>

    <div class="row text-center">
      <div class="col-md-12 col-lg-12 align-items-center">
        <form class="needs-validation" novalidate>
          <div class="row g-3 justify-content-center">
            <div class="col-2" style="width:10%">
              <label for="product" class="form-label">Sale Code</label>
              <input type="text" class="form-control" ng-model="saleCartModel.id_sale" id="sale_id" ng-blur="disableInput();" placeholder="Code" value="" required>
            </div>
            <div class="col-2" style="margin-left:30px; width:30%">
              <label for="price" class="form-label">Product</label>
              <select class="form-select" ng-model="saleCartModel.product_cart" aria-label="Select a product">
                    <option selected>Select a Product</option>
                    <option value=2>teste</option>
                    <option ng-repeat="product in products" value="product.product">{{product.product}} - {{product.price}}</option>
                </select>
            </div>
            <div class="col-2" style="width:15%">
              <label for="email" class="form-label">Amount</label>
              <input type="number" class="form-control" ng-model="saleCartModel.amount" id="amount" placeholder="0">
            </div>
            <div class="col-1" >
              <label for="email" class="form-label">Add to cart</label>
              <button type="button" class="btn btn-primary" ng-click=addToCart() data-bs-toggle="button"><i class="fa-solid fa-cart-arrow-down"></i></button>
            </div>
          </div>
          <div class="row g-3 justify-content-center" style="margin-top:10px">
            <h2>Cart</h2>
              <ul class="list-group" style="width:50%;">
                    <li class="list-group-item">An item</li>
              </ul>
          </div>    
          <hr class="my-4">
          <div class="row g-2 justify-content-center">
              <button  ng-hide="edit"class="col-md-2 btn btn-primary btn-md" ng-click="saveTheSale()" type="submit">Finish the Sale</button>
          </div>  
          

        </form>
      </div>
    </div>
    <div class="py-5 text-center">
      <h4>Sales List</h4>
    </div>
    <table class="table table-striped">
          <thead>
          <tr>
            <th class="text-center" scope="col">Cod</th>
            <th class="text-center" scope="col">Product</th>
            <th class="text-center" scope="col">Type</th>
            <th class="text-center" scope="col">Price un.</th>
            <th class="text-center" scope="col">Total Price</th>
            <th class="text-center" scope="col">Amount</th>
            <th class="text-center" scope="col">Taxes</th>
            <th class="text-center" scope="col">Total Taxes</th>
            <th class="text-center" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="product in products">
            <th class="text-center" scope="row">{{product.cod}}</th>
            <td class="text-center">{{product.product}}</td>
            <td class="text-center">{{product.type_product}}</td>
            <td class="text-center">{{product.price}}</td>
            <td class="text-center">{{product.price}}</td>
            <td class="text-center">{{product.amount}}</td>
            <td class="text-center">{{product.taxes}}</td>
            <td class="text-center">{{product.taxes}}</td>
            <td class="text-center">
            <button type="button" class="btn btn-primary" ng-click=editProduct(product.cod) data-bs-toggle="button"><i class="fa-solid fa-pencil"></i></button>
            <button type="button" class="btn btn-danger" ng-click="deleteProduct(product.cod)"data-bs-toggle="button"><i class="fa-solid fa-trash-can"></i></button>
            </td>
          </tr>
        </tbody>
    </table>
  </main>
</div>
    </body>
  <?php include("includes/footer.php") ?>