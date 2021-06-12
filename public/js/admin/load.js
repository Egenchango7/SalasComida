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

           

           // Setup Carousel, Nav, and Nav Toggle
          // setupCarousel();
          setupNav();
          setupNavToggle();
        }	      	
        let icon = $('#permisos').find('.material-icons-round');
        icon.css('color', iconPermisos[(rests[0].permisos ? 1 : 0)].color);
        icon.text(iconPermisos[(rests[0].permisos ? 1 : 0)].text);
  });