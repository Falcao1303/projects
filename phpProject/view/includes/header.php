<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" />
    <title>Mercado Express</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">

    
    <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>
</head>
<body>

    <div class="main-container flex">
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="logo">
                    <img src="../assets/img/logo_mercado.png" alt="Mercado Express" class="logo">
                </div>

                <ul class="side-menu">
                    <li class="<?php echo $uriSegments[1] == 'venda' ? 'active' : '' ?>">
                        <a href="/venda/?cod=<?php echo $_SESSION['codVenda'] ?>" class="block">
                            <i class="fas fa-cash-register"></i>
                            <p>CAIXA</p>
                        </a>
                    </li>
                    <li class="<?php echo in_array($uriSegments[1], ['', 'produtos', 'tipos']) ? 'active' : '' ?>">
                        <a href="/produtos" class="block ">
                            <i class="fas fa-dolly"></i>
                            <p>PRODUTOS</p>
                        </a>
                    </li>
                </ul>

            </div>
        </aside>
        <div class="container w-100">
            <div class="topbar">
                <p class="text-center"><?php echo date('d/m/Y') ?></p>
            </div>
            