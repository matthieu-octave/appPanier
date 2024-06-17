const euro = new Intl.NumberFormat('fr-FR', {
    style: 'currency',
    currency: 'EUR',
    minimumFractionDigits: 2
});

function updateQuantity(action, productId, rowId) {
    console.log(action, productId, rowId);
    let qtyInputId = 'cartRow' + rowId;
    let rowTotalId = 'rowTotal' + rowId;
    let qtyInput = document.getElementById(qtyInputId);
    let currentQty = parseInt(qtyInput.value);
    let rowTotal = document.getElementById(rowTotalId)
    let grandTotal = document.getElementById("grandTotal");
    let badge = document.getElementById('badge');
    let totalQty = parseInt(badge.innerText);
    console.log(totalQty);

    $.ajax({
        type: "GET", //Méthode à employer POST ou GET 
        url: "cartProcessing.php", //Cible du script coté serveur à appeler
        data: { //Données à envoyer
            productId: productId,
            currentQty: currentQty,
            action: action
        },
    }).done((response) => {
        //Code à jouer en cas d'éxécution sans erreur du script du PHP
        response = JSON.parse(response);
        

        if (action == 'plus') {
            qtyInput.value = currentQty + 1;
            totalQty += 1
        } else {
            qtyInput.value = currentQty - 1;
            totalQty -= 1
        }


        // récupérer l'élément html où s'affiche le montant du panier et le modifer
        rowTotal.innerHTML = euro.format(response.rowTotal);
        grandTotal.innerHTML = '<strong>' + euro.format(response.grandTotal) + '</strong>';
        badge.innerHTML = totalQty;


    }).fail(function (error) {
        //Code à jouer en cas d'éxécution en erreur du script du PHP ou de ressource introuvable
        console.log("Echec de la requete : " + JSON.stringify(error));
    }).always(()=>{
        //code à éxécuter dans tous les cas
    });
}