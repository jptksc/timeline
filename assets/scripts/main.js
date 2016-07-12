
/***********************************************************************************
  
Mailchimp Form Processing
  
************************************************************************************/

$(function() {

    // Get the form.
    var form = $('#mailchimp');

    // Get the messages div.
    var formLoading = $('#loading');
    var formMessages = $('.status');

    // Set up an event listener for the subscribe form.
    $(form).submit(function(e) {

        // Stop the browser from submitting the form.
        e.preventDefault();
        
        // Show the loading div.
        $(formLoading).fadeIn(100);

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })

        .done(function() {

            // Make sure that the formMessages div has the 'success' class.
            $(formMessages).removeClass('error');
            $(formMessages).addClass('success');
            $(formMessages).fadeIn(100);
            $(formMessages).delay(1000).fadeOut(500);
            $(formLoading).delay(1000).fadeOut(500);

            // Clear the form.
            $('#email').val('');
        })

        .fail(function() {

            // Make sure that the formMessages div has the 'error' class.
            $(formMessages).removeClass('success');
            $(formMessages).addClass('error');
            $(formMessages).fadeIn(100);
            $(formMessages).delay(1000).fadeOut(500);
            $(formLoading).delay(1000).fadeOut(500);
            
            // Clear the form.
            $('#email').val('');
        });
    });
});

/***********************************************************************************
  
Panel Toggles
  
************************************************************************************/

$(document).ready(function() {
    $('.open').click(function(){
        var myelement = $(this).attr('href');
        
        $('.opened').not(myelement).addClass('animated fast slide-out');
        
        $(myelement).removeClass('slide-out closed');
        $(myelement).addClass('opened animated fast slide-in');
        
        return false;
    });
    
    $('.close').click(function(){
        var myelement = $(this).attr('href');
        
        $(myelement).removeClass('slide-in opened');
        $(myelement).addClass('animated fast slide-out');
        
        return false;
    });
});

/***********************************************************************************
  
Video Toggles
  
************************************************************************************/

$(document).ready(function() {
    $('.play').click(function(){
        var myelement = $(this).attr('href');
        
        // Gather video variables.
        var videoType = $(this).data('video-type');
        var videoID = $(this).data('video-id');
        
        $('.opened').not(myelement).addClass('animated fast zoom-out');
        
        $(myelement).removeClass('fade-out closed');
        $(myelement).addClass('opened animated fast fade-in');
        
        $('#video .video .embed').addClass(''+videoType+'');
        
        // YouTube embeds.        
        if (videoType === 'youtube') {
            $('#video .video .embed').empty().append('<iframe src="//www.youtube.com/embed/'+videoID+'?rel=0&autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
        } 
        
        // Vimeo embeds.
        if (videoType === 'vimeo') {
            $('#video .video .embed').empty().append('<iframe src="https://player.vimeo.com/video/'+videoID+'?autoplay=1" frameborder="0" autoplay="true" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
        }
        
        return false;
    });
    
    $('.stop').click(function(){
        var myelement = $(this).attr('href');
        
        $(myelement).removeClass('fade-in opened');
        $(myelement).addClass('animated fast fade-out');
        
        $('#video .video .embed iframe').addClass('animated fast fade-out');
        
        setTimeout(function() {
            $('#video .video .embed').empty().removeClass('youtube vimeo');
            $(myelement).addClass('closed');
        }, 200);
        
        return false;
    });
});

/***********************************************************************************
  
Photo Toggles
  
************************************************************************************/

$(document).ready(function() {
    $('.view').click(function(){
        var myelement = $(this).attr('href');
        
        // Gather video variables.
        var postImage = $(this).data('post-image');
        
        $('.opened').not(myelement).addClass('animated fast zoom-out');
        
        $(myelement).removeClass('fade-out closed');
        $(myelement).addClass('opened animated fast fade-in');
        
        
        
        $('#photo .photo').empty().append('<img src="'+postImage+'" />');
        
        return false;
    });
    
    $('.done').click(function(){
        var myelement = $(this).attr('href');
        
        $(myelement).removeClass('fade-in opened');
        $(myelement).addClass('animated fast fade-out');
        
        setTimeout(function() {
            $('#photo .photo').empty();
            $(myelement).addClass('closed');
        }, 200);
        
        return false;
    });
});

/***********************************************************************************
  
Smooth Scrolling
  
************************************************************************************/

$(function() {
    $('.scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
            
                return false;
            }
        }
    });
});
