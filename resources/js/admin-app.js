require('./bootstrap');

let makeModelYear, makes

$(document).ready(function () {

    const redirect = actions.Redirect.create(app);

    $('.app-link').on('click', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        console.log(url);
        redirect.dispatch(actions.Redirect.Action.APP, url);
    });

    $('.shopify-link').on('click', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        redirect.dispatch(actions.Redirect.Action.ADMIN_PATH, url);
    });

    initialiseMakes();

    //Initialise makes dropdown
    function initialiseMakes() {

        let jsonData = $("#makeModelYear").val();
        makeModelYear = JSON.parse(jsonData.trim());
        console.log(makeModelYear);

        $.each(makeModelYear, function (key, val) {
            if ( !makes.includes(val.make) ) {
                makes.push(val.make);
            }
        });

        makes.sort();
        $.each(makes, function (key, val) {
            $('<option/>').val(val).html(val).appendTo('#truckMake');
        });

        $('#truckMake').trigger('change');
    }


});
