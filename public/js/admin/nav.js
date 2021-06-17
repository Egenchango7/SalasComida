// VAR
let indexSection = 1,
    idSection = '#tm-section-1';
// FUNCTIONS 
// Setup Nav
function changePage(currentNavItem) {
    // actualizar los elementos de navegacion
    $(".tm-main-nav a").removeClass("active");
   currentNavItem.addClass("active");

  $(currentPageID).hide();

  // mostrar pagina actual
  currentPageID = currentNavItem.data("page");
  $(currentPageID).fadeIn(1000);
      
}
function setupNav() {
    // Add Event Listener to each Nav item
   $(".tm-main-nav a").click(function(e){
       e.preventDefault();
      
      var currentNavItem = $(this);
      changePage(currentNavItem);

      // celular
      $("#tmSideBar").removeClass("show");
  });	    
}
// boton de navegacion |||
function setupNavToggle() {

    $("#tmMainNavToggle").on("click", function(){
        $(".sidebar").toggleClass("show");
    });
}
// EVENTS 
$('.listDiv').on('click', async function () {
    let nav = $(this).parent(),
        selected = nav.parent().find('.selected');
    if (selected) $(selected).removeClass('selected');
    $(this).addClass('selected');
    if (idSection != nav.data('page')) {
        toggleEditMode(true);
        idSection = nav.data('page');
        indexSection = Number(idSection.substr(idSection.length - 1));
    }
    isEdit = false;
    let idRest = $(`${idSection} select[name="listRest"]`).val();
    if (indexSection == 2) {
        refreshMenu(idRest);
    } else if (indexSection == 3) {
        let tipo = $(idSection).find('p select[name="tipoPlato"]').val();
        fillTablePlatos(`/platos/tipo/${tipo}/rest/${idRest}`);
    }
    
});