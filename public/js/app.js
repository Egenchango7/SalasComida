const hoverScroll = (div) => {
    $(div).hover(function () {
        $(div).css('overflow-y', 'scroll');
        $(div).find('.scrollBar').css('opacity', 0);
    }, function () {
        $(div).find('.scrollBar').css('opacity', 1);
        $(div).css('overflow-y', 'hidden');
    }
    );
}
hoverScroll('.tableMenu');
