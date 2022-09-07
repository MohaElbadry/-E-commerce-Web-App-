<?php



function connect()
{
    // 1-connexion vers la BD
    $servername = "localhost";
    $DBuser = "root";
    $DBpasswprd = "";
    $DBname = "ecommerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpasswprd);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: "/* . $e->getMessage()*/;
    }
    return $conn;
}

function getAllCategories()
{
    // 1-connexion vers la BD
    $conn = connect();
    // 2-creation de la requette 
    $requette = "SELECT * FROM categories";
    // 3-execution de la requette
    $resultat = $conn->query($requette);
    // 4-resultat de la requette
    $categories = $resultat->fetchAll();
    //var_dump($categories);
    return $categories;
}
function getAllProducts()
{
    // 1-connexion vers la BD
    $conn = connect();
    // 2-creation de la requette 
    $requette = "SELECT * FROM produit";
    // 3-execution de la requette
    $resultat = $conn->query($requette);
    // 4-resultat de la requette
    $produits = $resultat->fetchAll();
    return $produits;
}
function searchProduits($keyword)
{
    // 1-connexion vers la BD
    $conn = connect();
    // 2-creation de la requette 
    $requette = "SELECT * 
                FROM produit 
                WHERE nom_prod LIKE '%$keyword%'";
    // 3-execution de la requette
    $resultat = $conn->query($requette);
    // 4-resultat de la requette
    $produits = $resultat->fetchAll();
    return $produits;
}
function GetProduitById($Id)
{
    $conn = connect();
    $requette = "SELECT * 
                FROM produit 
                WHERE id_prod=$Id";
    $resultat = $conn->query($requette);
    $produit = $resultat->fetch();
    return $produit;
}

function AddVisiteur($data)
{
    $conn = connect();
    $mp_vis_hash = md5($data["mp_vis"]);
    $requette = "INSERT INTO visiteur (nom_vis,prenom_vis,email_vis,mp_vis,telephone,addresse)
                VALUES('" . $data["nom_vis"] . "',
                        '" . $data["prenom_vis"] . "',
                        '" . $data["email_vis"] . "',
                        '" . $mp_vis_hash . "',
                        '" . $data["telephone"] . "',
                        '" . $data["address"] . "')";

    $resultat = $conn->query($requette);
    return 1;
}


function ConnectVisiteur($data)
{
    $conn = connect();
    $email = $data['email'];
    $mp = md5($data['password']);
    $requette = $conn->prepare("SELECT * FROM visiteur WHERE email_vis= ? AND mp_vis=?");
    $requette->execute(array($email, $mp));
    // $resultat = $conn->query($requette);
    $user = $requette->fetch();
    return $user;
}
function ConnectAdmin($data)
{
    $conn = connect();
    $email = $data['email'];
    $mp = md5($data['password']);
    $requette = $conn->prepare("SELECT * FROM administrateur WHERE email_admin= ? AND mp_admin=?");
    $requette->execute(array($email, $mp));
    // $resultat = $conn->query($requette);
    $user = $requette->fetch();
    return $user;
}

function getAllUsers()
{
    $conn = connect();

    $requette = "SELECT * FROM visiteur WHERE etat=0";

    $resultat = $conn->query($requette);

    $users = $resultat->fetchAll();

    return $users;
}

function getStocks()
{
    $conn = connect();
    $requette = "SELECT p.nom_prod,s.quantite,s.id_stock FROM produit p, stock s WHERE p.id_prod = s.id_prod";
    $resultat = $conn->query($requette);
    $stocks = $resultat->fetchAll();
    return $stocks;
}

function getAllPaniers()
{
    $conn = connect();
    $requette = "SELECT id_pan,nom_vis,prenom_vis,telephone,total,p.date_creation,p.etat ,p.etat
                 FROM panier p , visiteur v 
                 where p.id_vis = v.id_vis";
    $resultat = $conn->query($requette);
    $Paniers = $resultat->fetchAll();
    return $Paniers;
}

function getAllCommandes()
{
    $conn = connect();
    $requette = "SELECT p.nom_prod , image , quantite ,total , id_pan 
                 FROM produit p , commandes  c
                 where p.id_prod = c.id_prod";
    $resultat = $conn->query($requette);
    $Commandes = $resultat->fetchAll();
    return $Commandes;
}

function ChangeEtat($var = 'en cours', $id)
{
    $conn = connect();
    $requette = $conn->prepare("UPDATE panier SET etat=? WHERE id_pan=?");
    $requette->execute(array($var, $id));
}

// function getPanierByEtat($etat)
// {
//     $conn = connect();
//     $requette = $conn->prepare("SELECT * FROM panier where etat= '?'");
//     $requette->execute( $etat);
//     $Paniers = $requette->fetchAll();
//     return $Paniers;
// }
function getPaniersByEtat($paniers, $etat)
{
    $paniersEtat = array();
    foreach ($paniers as $p) {
        if ($p['etat'] == $etat) {
            array_push($paniersEtat, $p);
        }
    }

    return $paniersEtat;
}

function editEmail($data)
{
    $passwoprd = md5($data['password']);
    $conn = connect();
    if ($passwoprd == $_SESSION['password']) {
        $nom = $data['nom'];
        $email = $data['email'];
        $id = $data['id'];
        $requette = "UPDATE administrateur SET nom_admin ='$nom', email_admin ='$email'
                    WHERE id_admin='$id'";
        $resultat = $conn->query($requette);
        print '<script>
                alert("votre information sont mis  a jour");
                </script>';
    } else {
        print '<script>
                alert("Mots de passe incorrect");
                </script>';
    }
    return true;
}

function getData()
{
    $data = array();
    $conn = connect();

    $requette = " SELECT COUNT(id_prod) FROM produit ";
    $resultat = $conn->query($requette);
    $nbrPrds = $resultat->fetch();

    $requette1 = " SELECT COUNT(id_cat) FROM categories ";
    $resultat = $conn->query($requette1);
    $nbrCat = $resultat->fetch();

    $requette2 = "SELECT COUNT(id_vis) FROM  visiteur";
    $resultat = $conn->query($requette2);
    $nbrClients = $resultat->fetch();

    $requette3 = "SELECT COUNT(id_pan) FROM  panier";
    $resultat = $conn->query($requette3);
    $nbrpan = $resultat->fetch();

    $data[" produits "] = $nbrPrds[0];
    $data[" categories "] = $nbrCat[0];
    $data[" clients "] = $nbrClients[0];
    $data["pan"] = $nbrpan[0];
    return $data;
}

function lastVis()
{
    $conn = connect();
    $requette = "SELECT *
                 FROM visiteur 
                 ORDER BY id_vis DESC LIMIT 1";
    $resultat = $conn->query($requette);
    $vis = $resultat->fetchAll();
    return $vis;
}
