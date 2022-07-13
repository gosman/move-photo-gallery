require('./bootstrap');

let makeModelYear, make, model, year;

$(document).ready(function () {

    //App link redirecion
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

    $(".image-preview").on('click', function () {

        let imageUrl = $(this).attr('src');

        Swal.fire({
            imageUrl: imageUrl,
            imageWidth: '100%',
            width: '90%',
            position: 'top'
        })
    });


    //Initialise dropdowns
    getMakes($("#truckMake").data('selected'));
    getModels($("#truckModel").data('selected'));
    getYears($("#truckYear").data('selected'));

    //Truck make changed
    $('#truckMake').on('change', function () {

        make = $(this).val();
        getModels();
    });

    //Truck model changed
    $('#truckModel').on('change', function () {

        model = $(this).val();
        getYears();
    });

    //Get makes
    function getMakes(selectedMake) {

        make = selectedMake;

        var makes = [];
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

                if ( val.toLowerCase() == make ) {
                    $('<option/>').val(val).html(val).attr('selected', true).appendTo('#truckMake');
                } else {
                    $('<option/>').val(val).html(val).appendTo('#truckMake');
                }
            });

            $('#truckMake').trigger('change');
        }
    }

    //Get models by make
    function getModels(selectedModel = null) {

        model = selectedModel;

        var models = [];
        $('#truckModel').html(`<option value="" disabled selected>Select a model </option>`);
        $('#truckYear').html(`<option value="" disabled selected>Select a year</option>`);

        makeModelYear.filter(function (item) {
            if ( item.make == make ) {

                if ( !models.includes(item.model) ) {
                    models.push(item.model);
                }
            }
        });

        models.sort();

        $.each(models, function (key, val) {
            if ( val.toLowerCase() == model ) {
                $('<option/>').val(val).html(val).attr('selected', true).appendTo('#truckModel');
            } else {
                $('<option/>').val(val).html(val).appendTo('#truckModel');
            }
        });
    }

    //Get years by model by make
    function getYears(selectedYear = null) {

        year = selectedYear;
        var years = [];
        $('#truckYear').html(`<option value="" disabled selected>Select a year</option>`);

        makeModelYear.filter(function (item) {
            if ( item.make == make && item.model == model ) {

                if ( !years.includes(item.year) ) {
                    years.push(item.year);
                }
            }
        });

        years.sort();

        $.each(years, function (key, val) {

            if ( val.toLowerCase() == year ) {
                $('<option/>').val(val).html(val).attr('selected', true).appendTo('#truckYear');
            } else {
                $('<option/>').val(val).html(val).appendTo('#truckYear');
            }
        });
    }

});
