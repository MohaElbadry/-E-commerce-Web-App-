 <div id="sidebar">
     <div class="sidebar__title">
         <div class="sidebar__img">
             <h1>Panneaux Alum</h1>
         </div>
     </div>
     <div class="sidebar__menu">
         <div class="sidebar__link <?php if ($_SERVER['PHP_SELF'] == '/E-COMMERCE/admin/home.php') echo 'active_menu_link'; ?>">
             <i class="fa fa-home"></i>
             <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/E-COMMERCE/admin/home.php">Dashboard
             </a>
         </div>
         <h2>MANAGEMENT</h2>
         <div class="sidebar__link <?php if ($_SERVER['PHP_SELF'] == '/E-COMMERCE/admin/profile.php') echo 'active_menu_link'; ?> ">
             <i class="fa fa-user-secret" aria-hidden="true"></i>
             <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/E-COMMERCE/admin/profile.php">Admin Management</a>
         </div>
         <div class="sidebar__link <?php if ($_SERVER['PHP_SELF'] == '/E-COMMERCE/admin/categorie/list.php') echo 'active_menu_link'; ?>">
             <i class="fa fa-building-o"></i>
             <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/E-COMMERCE/admin/categorie/list.php">Categories Management</a>
         </div>
         <div class="sidebar__link <?php if ($_SERVER['PHP_SELF'] == '/E-COMMERCE/admin/produits/list.php') echo 'active_menu_link'; ?>">
             <i class="fa fa-wrench"></i>
             <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/E-COMMERCE/admin/produits/list.php">Produits Management</a>
         </div>
         <div class="sidebar__link <?php if ($_SERVER['PHP_SELF'] == '/E-COMMERCE/admin/commandes/list.php') echo 'active_menu_link'; ?>">
             <i class="fa fa-handshake-o"></i>
             <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/E-COMMERCE/admin/commandes/list.php">Paniers Management</a>
         </div>
         <div class="sidebar__link <?php if ($_SERVER['PHP_SELF'] == '/E-COMMERCE/admin/produits/stock/list.php') echo 'active_menu_link'; ?>">
             <i class="fa fa-question"></i>
             <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/E-COMMERCE/admin/produits/stock/list.php">Stock Management</a>
         </div>
         <h2>VARIFICATION</h2>
         <div class="sidebar__link <?php if ($_SERVER['PHP_SELF'] == '/E-COMMERCE/admin/visiteurs/list.php') echo 'active_menu_link'; ?>">
             <i class="fa fa-archive"></i>
             <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/E-COMMERCE/admin/visiteurs/list.php">Verification Des Utilisatuers</a>
         </div>


     </div>
 </div>
 