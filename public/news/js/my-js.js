function store() {
    localStorage.setItem('fullname', document.getElementById('fullname').value);
    localStorage.setItem('phone', document.getElementById('phone').value);
    localStorage.setItem('email', document.getElementById('email').value);
}
$('document').ready(function() {
    // document.getElementById('fullname').value = localStorage.getItem('fullname');
    // document.getElementById('phone').value = localStorage.getItem('phone');
    // document.getElementById('email').value = localStorage.getItem('email');

    if ($("#box-gold").length) {
        $("#box-gold").load($("#box-gold").data("url"), null, function(response, status) {
            if (status == 'success') {
                let data = JSON.parse(response);
                let tmpl = $("#template-box-gold").html();
                Mustache.parse(tmpl);
                $("#box-gold").html(Mustache.render(tmpl, { items: data }));
                // console.log(response);
                // console.log(data);
                // $('#box-gold').html(render)
            }
        });
        // $("#box-coin").load($("#box-coin").data("url"));
    }
});