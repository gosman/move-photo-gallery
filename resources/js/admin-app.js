require('./bootstrap');

let makeModelYear, makes = [];

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


    //Initialise makes dropdown
    getMakes($("#truckMake").data('selected'));
    getModels($("#truckModel").data('selected'));

    //getYears($("#truckYear").data('selected'));

    function getMakes(selectedMake = null) {

        if ( $("#makeModelYear").length ) {
            let jsonData = $("#makeModelYear").val();
            makeModelYear = JSON.parse(jsonData.trim());

            $.each(makeModelYear, function (key, val) {

                if ( !makes.includes(val.make) ) {
                    makes.push(val.make);
                }
            });

            makes.sort();
            $.each(makes, function (key, val) {

                if ( val.toLowerCase() === selectedMake ) {
                    $('<option/>').val(val).html(val).attr('selected', true).appendTo('#truckMake');
                } else {
                    $('<option/>').val(val).html(val).appendTo('#truckMake');
                }
            });

            $('#truckMake').trigger('change');
        }
    }

    //Get user model by make
    function getModels(selectedMake) {

        var models = [];
        $('#makeModel').html(`<option value="" disabled selected>Select a model </option>`);
        $('#makeYear').html(`<option value="" disabled selected>Select a year</option>`);

        makeModelYear.filter(function (item) {

            if ( !models.includes(item.model) ) {
                models.push(item.model);
            }
        });

        models.sort();

        $.each(models, function (key, val) {
            if ( val.toLowerCase() == selectedMake ) {
                $('<option/>').val(val).html(val).attr('selected', true).appendTo('#truckModel');
            } else {
                $('<option/>').val(val).html(val).appendTo('#truckModel');
            }
        });
    }

});
