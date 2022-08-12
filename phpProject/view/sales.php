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

  <body class="bg-light" ng-app="system">
    
<div class="container" ng-controller = "systemController" >
  <main >
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/img/cart.png" alt="" width="100" height="100">
      <h2>Products Register</h2>
      <p class="lead">Welcome to register system, below you can register the product,price and amount</p>
    </div>

    <div class="row text-center">
      <div class="col-md-12 col-lg-12 align-items-center">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-md-6 offset-md-3 ">
              <label for="product" class="form-label">Product Description</label>
              <input type="text" class="form-control" id="product" placeholder="Description" value="" required>
              <div class="invalid-feedback">
                Valid Description is required.
              </div>
            </div>

            <div class="col-md-2 offset-md-3 ">
              <label for="price" class="form-label">Price</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="price" placeholder="R$0,00" required>
              <div class="invalid-feedback">
                  The price is required.
                </div>
              </div>
            </div>

            <div class="col-md-2 offset-md-2">
              <label for="email" class="form-label">Amount</label>
              <input type="number" class="form-control" id="amount" placeholder="0">
              <div class="invalid-feedback">
                Please enter a valid amount
              </div>
            </div>

            <div class="col-md-2 offset-md-3">
              <label for="taxes" class="form-label">Taxes</label>
              <input type="text" class="form-control" id="address" placeholder="Taxes" required numeric-only>
              <div class="invalid-feedback">
                Please enter a valid value
              </div>
            </div>

            <div class="col-md-2 offset-md-2">
              <label for="type" class="form-label">Type</label>
              <input type="text" class="form-control" id="type" placeholder="Type">
            </div>
          </div>

          <hr class="my-4">

          <button class="w-10 btn btn-primary btn-lg" type="submit">Save the register</button>
        </form>
      </div>
    </div>
  </main>
    </body>
  <?php include("includes/footer.php") ?>