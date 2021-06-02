// Setup Nav
function setupNav() {
    // Add Event Listener to each Nav item
   $(".tm-main-nav a").click(function(e){
       e.preventDefault();
      
      var currentNavItem = $(this);
      changePage(currentNavItem);
      
      setupCarousel();
    //   setupFooter();

      // celular
      $("#tmSideBar").removeClass("show");
  });	    
}
$('.listDiv').on('click', function () {
    let selected = $(this).parent().parent().find('.selected');
    if (selected) {
        $(selected).removeClass('selected');
    }
    $(this).addClass('selected');
});