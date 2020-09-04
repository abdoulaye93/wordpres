
window.addEventListener("load", function(event) {
    var tag = document.getElementsByClassName("checkout woocommerce-checkout");
    $( "form" ).submit(function( event ) {

        event.preventDefault();
        var form = $(this);
        var url = form.attr('http://localhost/wordpress/commande/');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                console.log(data); // show response from the php script.
            }
        });
    });

    // tag[0].addEventListener("submit", function(e){
    //
    //
    //     var error = document.getElementsByClassName("woocommerce-error");
    //     console.log(e)
    //     // error[0].remove()
    // });
    var text = document.createTextNode("Tutorix is the best e-learning platform");
    btn = document.createElement('button')
        btn.innerHTML="Payer avec PayDunya"
        btn.setAttribute('class','pay')
        btn.setAttribute('onclick','payWithPaydunya(this)')
        btn.setAttribute('style','background-color:#0070B2;margin-top:10px;margin-left:25px;')
    // tag[0].after(btn)
    document.getElementById("payment").after(btn)
    //document.getElementById("payment").remove()


});

function payWithPaydunya(btn) {
    event.preventDefault()
    PayDunya.setup({
        selector: $(btn),
        url: wnm_custom.template_url+"/wp-json/wp/v1/paydunya-api",
        method: "GET",
        displayMode: PayDunya.DISPLAY_IN_POPUP,
        beforeRequest: function() {
            console.log("About to get a token and the url");
        },
        onSuccess: function(token) {
            console.log("Token: " +  token);
        },
        onTerminate: function(ref, token, status) {
            alert("le paiement a été effectué avec succès")

            console.log(ref);
            console.log(token);
            console.log(status);
        },
        onError: function (error) {
            alert("Unknown Error ==> ", error.toString());
        },
        onUnsuccessfulResponse: function (jsonResponse) {
            console.log("Unsuccessful response ==> " + jsonResponse);
        },
        onClose: function() {
            console.log("Close");
        }
    }).requestToken();
}