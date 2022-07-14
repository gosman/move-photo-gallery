require('./bootstrap');

let makeModelYear, make, model, year;
let spinner = `<svg class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
               </svg>`;

$(document).ready(function () {

    //App link redirecion
    const redirect = actions.Redirect.create(app);

    $('.app-link').on('click', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        redirect.dispatch(actions.Redirect.Action.APP, url);
    });

    $('.shopify-link').on('click', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        redirect.dispatch(actions.Redirect.Action.ADMIN_PATH, url);
    });


    //Search Gallery
    $("#search").autocomplete({
        source: "/gallery-admin/search",
        minLength: 2,
        appendTo: null,
        select: function (event, ui) {

            $(this).val(ui.item.label)
            let filter = ui.item.value;
            console.log(filter);
            window.location.href = `/gallery-admin/approved?filter=${ filter }`;
        }
    });

    //Update submission
    $("form").on('submit', function (e) {

        e.preventDefault();
        let action = $(this).attr('action');
        let method = $(this).attr('method');
        let data = {};
        let button = e.originalEvent.submitter;

        $(button).html(spinner).prop('disabled', true);

        $(this).serializeArray().map(function (attr) {
            data[attr.name] = attr.value;
        });

        $.ajax({
            type: method,
            url: action,
            data: data,
            success: function (response) {
                if ( response.success ) {
                    window.location.reload();
                }
            }
        });
    });


    //Image preview
    $(".image-preview").on('click', function () {

        let imageUrl = $(this).attr('src');

        Swal.fire({
            imageUrl: imageUrl,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            didOpen: () => {
                $(".swal2-popup").css("background-color", "transparent");
                $(".swal2-close").css("background-color", "black");
                $(".swal2-close:focus").css("box-shadow", "none");
            }
        })
    });


    //Image approved/unapproved
    $(".image-approve").on('click', function (e) {

        e.preventDefault();

        $(this).html(spinner);

        let id = $(this).data('id');
        let approve = $(this).data('approve');


        $.ajax({
            type: 'PATCH',
            url: `/gallery-admin/image/${ id }/approval`,
            data: { approved: approve },
            success: function (response) {
                if ( response.success ) {
                    window.location.reload();
                }
            }
        });
    });


    //Image preview
    $(".image-delete").on('click', function (e) {

        e.preventDefault();

        let id = $(this).data('id');
        let imageUrl = $(this).data('image');

        Swal.fire({
            imageUrl: imageUrl,
            imageWidth: 200,
            title: 'Delete Image',
            text: "Are you sure?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Delete',
            position: 'top',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            showLoaderOnConfirm: true,
            preConfirm: () => {

                $(this).html(spinner);

                return fetch(`/gallery-admin/image/${ id }`, {
                    'method': 'DELETE',
                })
                    .then(response => {
                        if ( !response.ok ) {
                            throw new Error(response.statusText)
                        }

                        window.location.reload();
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${ error }`
                        )
                    })
            }
        });
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

                $('<option/>').val(val).html(val).appendTo('#truckMake');
            });

            $('#truckMake').val(make).trigger('change');
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
            $('<option/>').val(val).html(val).appendTo('#truckModel');
        });

        if ( selectedModel ) {

            $('#truckModel').val(model).trigger('change');
        }

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
            $('<option/>').val(val).html(val).appendTo('#truckYear');
        });

        if ( selectedYear ) {

            $('#truckYear').val(year).trigger('change');
        }
    }

});
