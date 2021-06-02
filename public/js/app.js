const hoverScroll = (div) => {
    $(div).hover(function () {
        // $(div).css('overflow-y', 'scroll');
        $(div).find('.scrollBar').css('opacity', 0);
    }, function () {
        $(div).find('.scrollBar').css('opacity', 1);
        setTimeout(() => {
            // $(div).css('overflow-y', 'hidden');
        },400);
    }
    );
}
hoverScroll('.divMenu');
hoverScroll('.divColumn');
