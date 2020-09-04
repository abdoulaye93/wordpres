
function payWithPaydunya(btn) {

    PayDunya.setup({
        selector: $(btn),
        url: "https://votre-domaine/paydunya-api",
        method: "GET",
        displayMode: PayDunya.DISPLAY_IN_POPUP,
        beforeRequest: function() {
            console.log("About to get a token and the url");
        },
        onSuccess: function(token) {
            console.log("Token: " +  token);
        },
        onTerminate: function(ref, token, status) {
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