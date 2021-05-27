function changePage(currentNavItem) {
    // actualizar los elementos de navegacion
    $(".tm-main-nav a").removeClass("active");
   currentNavItem.addClass("active");

  $(currentPageID).hide();

  // mostrar pagina actual
  currentPageID = currentNavItem.data("page");
  $(currentPageID).fadeIn(1000);
      
}