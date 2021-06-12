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
let indexSection = 1,
    idSection;
// EVENTS 
$('.listDiv').on('click', async function () {
    let nav = $(this).parent(),
        selected = nav.parent().find('.selected');
    idSection = nav.data('page');
    indexSection = Number(idSection.substr(idSection.length - 1));
    let idRest = $(idSection).find('select[name="listRest"]').val();
    if (indexSection == 2) {
        await getTiposMenuByRest(idRest);
        let tipoMenu = $(`${idSection} h2 .tipoMenu`).val();
        fillTableMenu(idRest, tipoMenu)
    } else if (indexSection == 3) {
        let tipo = $(idSection).find('p select[name="tipoPlato"]').val();
        fillTablePlatos(`/platos/tipo/${tipo}/rest/${idRest}`);
    }
    if (selected) $(selected).removeClass('selected');
    $(this).addClass('selected');
});