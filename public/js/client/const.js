const myMap = new Maps();
const windowW = window.innerWidth;
const windowH = window.innerHeight;
const isMediumWindow = windowW > 1280 && windowH > 720;
const urlIcon = isMediumWindow ? 
    'https://i.postimg.cc/65GCkjzh/marker-Rest-White.png' :
    'https://i.postimg.cc/7Lwv11Rd/marker-Default-60x75.png';
const biggerIcon = isMediumWindow ? 
    'https://i.postimg.cc/QMn0XyrT/marker-Defaul-100x125.png' :
    // 'https://i.postimg.cc/Dfc8LDBk/marker-Selected.png'; 
    'https://i.postimg.cc/65GCkjzh/marker-Rest-White.png';
const hoverScroll = (div) => {
    $(div).hover(function () {
        $(div).find('.scrollBar').css('opacity', 0);
    }, function () {
        $(div).find('.scrollBar').css('opacity', 1);
    }
    );
}