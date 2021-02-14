var product = [];
var number_product = 0;
var price_t = 0;
var fini = 0;
var button = 0;

//initialise l'affichage
function full_ini()
{
    initiate();
    affich_basket();
    show_number();
    lunch_time();
}

//vérifie si les cookies n'ont pas déjà été accepté
function lunch_time() {
    var data = sessionStorage.getItem("cookie");
    if (data !== "ok") {
        cookie_time()
    }
}

//Si ils sont pas accepté, affiche le message des cookies
function cookie_time() {
    var policyurl = "https://mywebsite.com/cookies-policy",
    okcolor = "#7CCBDE";
    var body = document.querySelector(".cookie");
    var bar = document.createElement("div");
    bar.id = "cookie-bar";
    bar.style = "position:fixed; bottom:0; left:0; width: 100%;  text-align: center; padding: 12px 0; margin:0;  background: rgba(244, 244, 244, 0.9);  color: #919191;  font: 14px arial, sans-serif;"
    
    body.appendChild(bar);
    var text = document.createElement("div");
    var politique = document.createElement("a");
    politique.id = "cookie-policy";
    politique.href = policyurl;
    politique.style = "color: #919191;font-weight:bold;";
    politique.innerText = "Consulter notre politique des cookies !";
    text.innerText = "Ce site web utilise des cookies - "
    text.style = "display:inline-block;width:78%;margin:0; font-family: Arial;";
    bar.appendChild(text);
    text.appendChild(politique);
    var agree = document.createElement("span");
    agree.id = "agree";
    agree.style = "position:absolute;bottom:5px;right:4%;color: #FFFFFF;background: "+okcolor+";border-radius: 3px; line-height: 30px; padding: 0 8px;margin: 0;font-weight: 600;"
    agree.innerText = "ok";
    body.appendChild(agree);
    document.getElementById("agree").addEventListener("click", hideCookiebar);
}

//Quand on appuie sur ok, le pop-up disparait laissant la confirmation et enregistre la décision
function hideCookiebar() {
    document.getElementById("agree").innerHTML = "cookies accepted";
    document.getElementById("cookie-bar").style.display = 'none';
    sessionStorage.setItem('cookie', 'ok');
} 


//Quand on appuiera sur un bouton "achat", plusieurs actions se fait
function add_product(x)
{
    var open = 1
    for (var z = 0; z < product.length; z++) {
        if (product[z][0] == x)  //On vérifie si l'id n'est pas déjà dans product
        {
            alert("Produit déjà dans le panier");  //Si il y est déjà, on indique qu'il est déjà dans le panier
            open = 0;
        }
    }
    if (open == 1) { //Si il n'y est pas alors on met l'id avec une valeur égale à 0 qui servira plus tard dans product
        product.push([x, 0]); 
        localStorage.setItem("product", JSON.stringify(product)); //Et on enregistre le nouveau tableau
    }   
    show_number(); 
}

//On actualiser le numéro du menu qui correspond au nombre de produit dans le panier
function show_number()
{
    var url = window.location.href;
    //On observe déjà si url indique une page qui a un "menu"
    if (url !== "http://localhost:8000/login" && url !== "http://localhost:8000/register" && url !== "http://localhost:8000/admin")
    {
        body = document.querySelector('#basket');
        body.innerText = "panier (" + product.length + ")"; 
    }
}

//On récupère le tableau "product" si il existe
function initiate()
{
    if (localStorage.getItem("product") !== null) {
        product = JSON.parse(localStorage.getItem("product"));
    }
}

//La fonction gère l'affichage des paniers
function affich_basket() {
    var url = window.location.href;
    if (url == "http://localhost:8000/basket") { //On vérifie si on est dans la bonne page
        price_t = 0;
        var final = document.querySelector("#final");
        final.innerText = "";
        final.innerText = "Prix Final: " + price_t + " €";  //On affiche le prix final par défaut
        create_index()
        for (var z = 0; z < product.length; z++) {
            show_product(z);
        }
    }
}

//Affiche la première ligne du tableau
function create_index()
{
    //On insère l'élément qui sert de ligne au panier
    var parent = document.querySelector(".panier");
    var div_produit = document.createElement("section");
    div_produit.className = "produit";      
    parent.appendChild(div_produit);

    //Puis on affiche la première case
    var div_titre = document.createElement("section");
    div_titre.className = "titre";
    div_produit.appendChild(div_titre);
    var strong = document.createElement("h3");
    strong.innerHTML = "Nom produit";
    div_titre.appendChild(strong);
    
    //Ensuite on affiche la deuxième case
    var div_unite = document.createElement("section");
    div_unite.className = "unité";
    div_produit.appendChild(div_unite);
    var strong = document.createElement("h3");
    strong.innerHTML = "Unité";
    div_unite.appendChild(strong);
    
    //Et enfin la dernière case
    var div_price = document.createElement("section");
    div_price.className = "price";
    div_produit.appendChild(div_price);
    var strong = document.createElement("h3");
    strong.innerHTML = "Prix";
    div_price.appendChild(strong);

    
}

//A la différence de la première ligne, les données sont variables
function show_product(z) {
    const token = document.querySelector('meta[name="csrf-token"]').content;
    const url = '/select';
    var nombre = product[z];
    fetch(url, {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
        },
        method: 'post',
        body: JSON.stringify({ //Nous faisons donc une requète à l'url /select
            q: nombre[0]
        })
    })
        .then(response =>
            response.json())
            
        .then(data => {
            //Selection l'emplacement du panier
            var parent = document.querySelector(".panier");
            
            //Crée une ligne pour un produit
            var div_produit = document.createElement("section");
            div_produit.className = "produit";             
            parent.appendChild(div_produit);

            //Crée la première case du produit
            var div_titre = document.createElement("section");
            div_titre.className = "titre";
            div_titre.innerText = data.panier[0].title;
            div_produit.appendChild(div_titre);
            
            //Crée la deuxième case du produit
            var div_unite = document.createElement("section");
            div_unite.className = "unité";
            div_unite.innerText = nombre[1]; //Il correspond à la quantité du produit choisi. Il est initialisé à 0 mais peut être modifié
            div_produit.appendChild(div_unite); 
            var space = document.createElement("br"); //On crée un saut de ligne
            div_unite.appendChild(space); 
            var div_input = document.createElement("input");
            div_input.type = "number";
            div_input.className = "new";
            div_input.name = "choose";
            div_input.min = 0;
            div_input.value = nombre[1];
            div_unite.appendChild(div_input); //On crée le input qui nous permet de récupérer la quantité qu'on souhaite
            var div_button = document.createElement("input");
            div_button.type = "button";
            div_button.setAttribute("onClick", "change(" + z +")");
            div_button.value = "change";
            div_unite.appendChild(div_button); //Ainsi que le bouton qui permet d'activer le changement

            //Crée la troisieme case du produit
            var div_price = document.createElement("section");
            div_price.className = "price";
            div_price.innerText = nombre[1] * data.panier[0].price;
            div_produit.appendChild(div_price); //On affiche le produit de la quantité et du prix d'un produit
            var space = document.createElement("br");
            div_price.appendChild(space);
            var div_button = document.createElement("input");
            div_button.type = "button";
            div_button.setAttribute("onClick", "remove(" + z +")");
            div_button.value = "retirer";
            div_price.appendChild(div_button); //Il s'agit donc du bouton qui permet de supprimer un produit du panier
            
            price_t = price_t + nombre[1] * data.panier[0].price; //On additionne tous les prix pour obtenir
            var final = document.querySelector("#final");         //le prix total
            final.innerText = "";
            final.innerText = "Prix Final: " + price_t + " €";
        })
        .catch(err => {
            console.log("Error Reading data " + err)
    })
}


//Permet de changer la quantité du produit x
function change(x) {    
    const token = document.querySelector('meta[name="csrf-token"]').content;
    const url = '/change';
    var div_panier = document.querySelector(".panier");
    for (var z = -1; z < x; z++) {
        var div_produit = document.querySelector(".produit"); //On supprime les lignes des produits qui sont pas concerné 
        div_panier.removeChild(div_produit);
    }
    var new_value = document.querySelector(".new").value; //On recupère ainsi la nouvelle valeur
    var nombre = product[z];
    fetch(url, {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
        },
        method: 'post',
        body: JSON.stringify({
            id: nombre[0],
            choose: new_value
        })
    })
        .then(response =>
            response.json())
            
        .then(data => {
            if (data.facture == "refused") { //Et on vérifie que la demande n'est pas plus élevé que le stock
                alert("Vous dépassez les stocks. Il nous reste " + data.stock + " de ce produit")
            } else {
                if (new_value > 0) {
                    product[x][1] = new_value; //La deuxieme valeur lié au produit en question reçoit la nouvelle valeur
                } else { 
                    product[x][1] = 0; 
                }
            }
            var div_supp = document.querySelector(".produit");
            while (div_supp !== null) {
                div_panier.removeChild(div_supp);
                div_supp = document.querySelector(".produit"); //On supprime les div pour retourner sur un terrain vide
            }
            localStorage.setItem("product", JSON.stringify(product)); //On enregistre la nouvelle valeur
            affich_basket(); //Et on affiche le panier avec les changements
            
        })
        .catch(err => {
            console.log("Error Reading data " + err)
    })
}

//Permet de supprimer un produit du panier
function remove(x) {
    product.splice(x, 1); //On supprime la paire de valeur du produit
    var div_panier = document.querySelector(".panier");
    var div_supp = document.querySelector(".produit");
    while (div_supp !== null) {    //On repart sur une nouvelle base
        div_panier.removeChild(div_supp);
        div_supp = document.querySelector(".produit");
    }
    localStorage.setItem("product", JSON.stringify(product)); //Enregistre la suppréssion
    full_ini();
}

//verifie les conditions et lance l'enregistrement de la facture
function save() {
    if (button == 0) { //On regarde déjà si nous pouvons activer le bouton, afin d'éviter la multi-application quand on appuie en rafale sur le bouton
        button = 1;
        finish = 1;
        number_facture = Math.floor(Math.random() * 2147483648); //Génère un numéro aléatoire pour réduire les chance d'obtenir deux fois le même numéro
        for (var z = 0; z < product.length; z++) {
            if (product[z][1] == 0) {     //On vérifie si tous les produits ont bien une quantité assigné non null
                finish = 0;     
            }
        }
        if (finish == 1) { //Si toutes les conditions sont respecté, lance le remplissage et l'enregistrement de la facture
            for (var z = 0; z < product.length; z++) {
                facture(z, number_facture);
            }
        } else { //Sinon réactive le bouton et préviens l'utilisateur
            button = 0;
            alert("Vous avez pas mis la quantité voulu pour l'un des produits de votre panier")
        }
    }
}

//Permet de remplir la facture
function facture(z, x) {
    const token = document.querySelector('meta[name="csrf-token"]').content;
    const url = '/facture';
    var nombre = product[z];
    fetch(url, {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
        },
        method: 'post',
        body: JSON.stringify({ //On envoie toutes les informations pour qu'elles puissent être enregistré
            id: nombre[0],
            choose: nombre[1],
            price_t: price_t,
            facture_number: x
        })
    })
        .then(response =>
            response.json())            
        .then(data => {
            fini = fini + 1;
            if (fini == product.length) { //On attend que l'assynchrone se termine 
                product = [];  //on vide le panier
                button = 0; //On rend possible l'activation du bouton
                localStorage.setItem("product", JSON.stringify(product)); //On enregistre le tableau vide
                document.location.href="/show";
            }
        })
        .catch(err => {
            console.log("Error Reading data " + err)
    })
}

full_ini();
