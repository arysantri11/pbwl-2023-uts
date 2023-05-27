<nav>
    <ul>
        <li>
            <a href="<?= URL ?>/Home/Index" class="<?= ($data['nav_aktif'] == 'Home') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Home
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/Kategori/Index" class="<?= ($data['nav_aktif'] == 'Kategori') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Kategori
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/User/Index" class="<?= ($data['nav_aktif'] == 'User') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Users
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/Produk/Index" class="<?= ($data['nav_aktif'] == 'Produk') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Produk
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/Keranjang/Index" class="<?= ($data['nav_aktif'] == 'Keranjang') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Keranjang
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/Order/Index" class="<?= ($data['nav_aktif'] == 'Order') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Pemesanan
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/Detail/Index" class="<?= ($data['nav_aktif'] == 'Detail') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Detail Pemesanan
            </a>
        </li>
    </ul>
</nav>