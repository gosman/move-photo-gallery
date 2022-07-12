require('./bootstrap');

let makeModelYear, make, model, year;

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
    getYears($("#truckYear").data('selected'));

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

                if ( val.toLowerCase() === make ) {
                    $('<option/>').val(val).html(val).attr('selected', true).appendTo('#truckMake');
                } else {
                    $('<option/>').val(val).html(val).appendTo('#truckMake');
                }
            });

            $('#truckMake').trigger('change');
        }
    }

    //Get model by make
    function getModels(selectedModel) {

        model = selectedModel;

        var models = [];
        $('#makeModel').html(`<option value="" disabled selected>Select a model </option>`);
        $('#makeYear').html(`<option value="" disabled selected>Select a year</option>`);

        makeModelYear.filter(function (item) {
            if ( item.make === make ) {

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

    //Get year by model by make
    function getYears(selectedYear) {

        year = selectedYear;
        console.log(year)
        console.log(make)
        console.log(model)

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

        console.log(years)

        $.each(years, function (key, val) {

            if ( val.toLowerCase() == year ) {
                $('<option/>').val(val).html(val).attr('selected', true).appendTo('#truckYear');
            } else {
                $('<option/>').val(val).html(val).appendTo('#truckYear');
            }
        });
    }

});
