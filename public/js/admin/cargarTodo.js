	// Everything is loaded including images.
    $(window).on("load", function(){

        // Render the page on modern browser only.
        if(renderPage) {
          // Remove loader
            $('body').addClass('loaded');

            // Page transition
            var allPages = $(".tm-section");

            // Hide all pages
            allPages.hide();

            $("#tm-section-1").fadeIn();

           // Set up background first page
           var bgImg = $("#tmNavLink1").data("bgImg");
           
           $.backstretch("img/" + bgImg, {fade: 500});

           // Setup Carousel, Nav, and Nav Toggle
          setupCarousel();
          setupNav();
          setupNavToggle();
          
          // Resize Carousel upon window resize
          $(window).resize(function() {
              setupCarousel();
              
          });
        }	      	
  });