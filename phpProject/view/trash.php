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
            