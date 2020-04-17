$(document).ready(function(){
    console.log('hi man!');

    $('.ibc-check-input').on('input', function () {
        if ($(this).val() == ''){
            $('.ibc-cars').each(function(i,elem) {
                $(this).removeClass("ibc-fog");
            });
        }
    });


    $( ".ibc-check" ).click(function(event) {
        event.preventDefault();
        let valinput = $( ".ibc-check-input" ).val();
        valinput = valinput.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
        console.log("/ajax.php?q="+valinput);
        httpGet("/ajax.php?q="+valinput)
            .then(
                response => onColored(response),
                error => console.log(`Rejected: ${error}`)
            );
    });

    $('.ibc-cars').each(function(i,elem) {
        $(this).prepend(`<h2>${i}</h2>`);
        $(this).addClass("ibc-hover");
    });
});

function httpGet(url) {

    return new Promise(function(resolve, reject) {

        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);

        xhr.onload = function() {
            if (this.status == 200) {
                resolve(this.response);
            } else {
                var error = new Error(this.statusText);
                error.code = this.status;
                reject(error);
            }
        };

        xhr.onerror = function() {
            reject(new Error("Network Error"));
        };

        xhr.send();
    });

}

function onColored(res) {
    if(res != 'true'){
        return;
    }
    $('.ibc-cars').each(function(i,elem) {
        $(this).addClass("ibc-fog");
        let lowName = $(this).children(".ibc-title").text().toLowerCase();
        if (lowName == $( ".ibc-check-input" ).val().toLowerCase()){
            $(this).removeClass("ibc-fog");
        }
    });
}