**CARD for the poducts**

<https://codepen.io/GeorgeGedox/pen/yEwoqP>

<https://codepen.io/ff0004-red/pen/WxJEJe>

---

**FOR index**

<https://codepen.io/Kalyan_Lahkar/pen/wpeaJx>
<https://codepen.io/creativemanner/pen/NWrNWrd>

---

**for tabels**

<https://freefrontend.com/tailwind-tables/>

**side bar**

<https://freefrontend.com/tailwind-sidebars/>

**nav bar**

<https://freefrontend.com/tailwind-navbars/>

---

**FOOTER**

<https://freefrontend.com/tailwind-footers/>

**DESIGNE**

<p>Seareche bar in the midl</p>
<p>panier must be icone an in the left</p>
<p>alert for the validation of the panier</p>
<https://getbootstrap.com/docs/5.2/components/badge/>


 


   
   <div class="row col-12 mt-5 mb-5">

        <?php
        foreach ($produits as $produit) {

            print ' <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="include/img/'. $produit['image'].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $produit['nom_prod'] . '</h5>' .

                //<p class="card-text">' . $produit['description_prod'] . '</p>

                '<a href="produit.php?id=' . $produit['id_prod'] . '" class="btn btn-primary">Afficher</a>
                            </div>
                        </div>
                    </div>';
        }


        ?>
    </div>