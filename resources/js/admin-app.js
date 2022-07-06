require('./bootstrap');


$(document).ready(function () {

    const redirect = actions.Redirect.create(app);

    $('.shopify-link').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        redirect.dispatch(actions.Redirect.Action.APP, url);
    })

    $('.app-link').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        console.log(url);
        redirect.dispatch(actions.Redirect.Action.ADMIN_PATH, url);
    })


});
