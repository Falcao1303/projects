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
    
<div class="container" style='margin-left:200px;' ng-controller = "systemController" >
  <main >
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/img/cart.png" alt="" width="100" height="100">
      <h2>Registro de Produtos</h2>
      <p class="lead">Bem-vindo ao Registro de Produtos!</p>
    </div>

    <div class="row text-center">
      <div class="col-md-12 col-lg-12 align-items-center">
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-md-2 offset-md-3 ">
              <label for="product" class="form-label">Código do Produto</label>
              <input type="text" class="form-control" ng-model="productModel.cod" id="product" placeholder="Codigo" value="" required>
            </div>

            <div class="col-md-3 offset-md-3 " style="margin-left:20px; width:30%">
              <label for="price" class="form-label">Preço</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" ng-model="productModel.price" id="price" placeholder="0.00" required>
              </div>
            </div>

            <div class="col-md-3 offset-md-3" style="width:15%">
              <label for="email" class="form-label">Quantidade</label>
              <input type="number" class="form-control" ng-model="productModel.amount" id="amount" placeholder="0">
            </div>

            <div class="col-md-3 offset-md-3" style="margin-left:10px; width:15%">
              <label for="taxes" class="form-label">Taxas</label>
              <input type="text" class="form-control" ng-model="productModel.taxes" id="address" placeholder="Taxas" required numeric-only>
            </div>

            <div class="col-md-2 offset-md-2" style="margin-left:10px; width:15%">
              <label for="type" class="form-label">Tipo</label>
              <input type="text" class="form-control" ng-model="productModel.type_product" id="type" placeholder="Tipo">
            </div>
          </div>

          <div class="col-md-2 offset-md-3 " style="margin-left:350px;margin-top: 10px; width:40%">
              <label for="product" class="form-label">Descrição</label>
              <input type="text" class="form-control" ng-model="productModel.product" id="product" placeholder="Descrição" value="" required>
            </div>

          <hr class="my-4">

          <button ng-hide="edit"class="w-10 btn btn-primary btn-lg" ng-click="registerProduct()" type="submit">Salvar</button>
          <button ng-hide="!edit" class="w-10 btn btn-success btn-lg" ng-click="updateProduct()" type="submit">Atualizar</button>
        </form>
      </div>
    </div>
    <div class="py-5 text-center">
      <h4>Products List</h4>
    </div>
    <table class="table table-striped">
          <thead>
          <tr>
            <th class="text-center" scope="col">Cod</th>
            <th class="text-center" scope="col">Produto</th>
            <th class="text-center" scope="col">Tipo</th>
            <th class="text-center" scope="col">Preço un.</th>
            <th class="text-center" scope="col">Preço Total</th>
            <th class="text-center" scope="col">Quantidade</th>
            <th class="text-center" scope="col">Taxas</th>
            <th class="text-center" scope="col">Total Taxas</th>
            <th class="text-center" scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="product in products">
            <th class="text-center" scope="row">{{product.cod}}</th>
            <td class="text-center">{{product.product}}</td>
            <td class="text-center">{{product.type_product}}</td>
            <td class="text-center">{{product.price}}</td>
            <td class="text-center">{{product.total_price}}</td>
            <td class="text-center">{{product.amount}}</td>
            <td class="text-center">{{product.taxes}}</td>
            <td class="text-center">{{product.total_taxes}}</td>
            <td class="text-center">
            <button type="button" class="btn btn-primary" ng-click=editProduct(product.cod) data-bs-toggle="button"><i class="fa-solid fa-pencil"></i></button>
            <button type="button" class="btn btn-danger" ng-click="deleteProduct(product.cod)"data-bs-toggle="button"><i class="fa-solid fa-trash-can"></i></button>
            </td>
          </tr>
        </tbody>
    </table>
  </main>
    </body>
  <?php include("includes/footer.php") ?>