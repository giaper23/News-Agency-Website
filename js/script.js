$(function() {

    // ---------- Date widget ---------- //

    function timestamp() {

        $.ajax({
            url: './php/timestamp.php',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
        
    }

    timestamp();

    setInterval(timestamp, 1000);

    // ---------------------------------//

    function load_data(query) {
        $.ajax({
            url: './php/search.php',
            method: "POST",
            data: {
                query: query
            },
            success: function (data) {
                $('#search-results').html(data); // Display the output there
            }
        });
    }

    $('#search-input').keyup(function () {
        let search = $(this).val(); // Input from the text box
        if (search != '') {
            load_data(search); // If it's not empty pass the input through load_data()
        } else {
            load_data();
        }

    });

    //-------------------------------- SUBSCRIBE FORM -----------------------------------//

    // Get the form1.
    var form1 = $('#search-2');

    // Get the messages div.
    var form1Messages = $('#subscribe-error');

    // Set up an event listener for the contact form1.
    $(form1).submit(function(event) {

    // Stop the browser from submitting the form1.
    event.preventDefault();

    // Serialize the form1 data.
    var form1Data = $(form1).serialize();

    // Submit the form1 using AJAX.
    $.ajax({
    type: 'POST',
    url: $(form1).attr('action'),
    data: form1Data
    })

    .done(function(data) {

    $(form1Messages).css("visibility", "visible");
    // Set the message text.
    $(form1Messages).html(data);

    // Clear the form1.
    $('#subscribe-email').val('');

})
.fail(function(data) {

    // Set the message text.
    if (data.responseText !== '') {
        $(form1Messages).html(data.responseText);
    } else {
        $(form1Messages).html('Oops! An error occured!');
    }
});
});


//-------------------------------- REGISTER FORM -----------------------------------//


    //     // Get the form2.
    //     var form4 = $('#registration-form');

    //     // Get the messages div.
    //     var form4Messages = $('#registration-error');
    
    //     // Set up an event listener for the contact form2.
    //     $(form4).submit(function(event) {
    
    //     // Stop the browser from submitting the form2.
    //     event.preventDefault();
    
    //     // Serialize the form2 data.
    //     var form4Data = $(form4).serialize();
    
    //     // Submit the form2 using AJAX.
    //     $.ajax({
    //     type: 'POST',
    //     url: $(form4).attr('action'),
    //     data: form4Data
    //     })
    
    //     .done(function(response) {

    //     $(form4Messages).css("visibility", "visible");

    //     // Set the message text.
    //     $(form4Messages).text("Check your email for confirmation link!");
    
    //     // Clear the form1.
    //     $('#registration-form').val('');
    
    // })
    // .fail(function(data) {

    //     // Set the message text.
    //     if (data.responseText !== '') {
    //         $(form4Messages).text(data.responseText);
    //     } else {
    //         $(form4Messages).text('Oops! An error occured!');
    //     }
    // });
    // });


    //-------------------------------- UNSUBSCRIBE FORM -----------------------------------//

        // Get the form2.
        var form2 = $('#search-3');

        // Get the messages div.
        var form2Messages = $('#unsubscribe-error');
    
        // Set up an event listener for the contact form2.
        $(form2).submit(function(event) {
    
        // Stop the browser from submitting the form2.
        event.preventDefault();
    
        // Serialize the form2 data.
        var form2Data = $(form2).serialize();
    
        // Submit the form2 using AJAX.
        $.ajax({
        type: 'POST',
        url: $(form2).attr('action'),
        data: form2Data
        })
    
        .done(function(data2) {

        $(form2Messages).css("visibility", "visible");

        // Set the message text.
        $(form2Messages).html(data2);
    
        // Clear the form1.
        $('#unsubscribe-email').val('');
    
    })
    .fail(function(data2) {

        // Set the message text.
        if (data.responseText !== '') {
            $(form2Messages).text(data2.responseText);
        } else {
            $(form2Messages).text('Oops! An error occured!');
        }
    });
    });


//-------------------------------- CONTACT FORM -----------------------------------//

//     // Get the form3.
//     var form3 = $('#contact-form');

//     // Get the messages div.
//     var form3Messages = $('#contact-error');

//     // Set up an event listener for the contact form1.
//     $(form3).submit(function(event) {

//     // Stop the browser from submitting the form1.
//     event.preventDefault();

//     // Serialize the form3 data.
//     var form3Data = $(form3).serialize();

//     // Submit the form3 using AJAX.
//     $.ajax({
//     type: 'POST',
//     url: $(form3).attr('action'),
//     data: form3Data
//     })

//     .done(function(data) {

//     $(form3Messages).css("visibility", "visible");
//     // Set the message text.
//     $(form3Messages).text("Message sent!");
    
//     // Clear the form3.

//     $('#contact-form').val('');

// })
// .fail(function(data) {

//     // Set the message text.
//     if (data.responseText !== '') {
//         $(form3Messages).text(data.responseText);
//     } else {
//         $(form3Messages).text('Oops! An error occured!');
//     }
// });
// });    

});

        
