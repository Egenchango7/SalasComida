$('td .btnAdd .material-icons-round').on('click', (e) => {
    let msg = $(e.target).parent().next(),
        input = msg.parent().find('input');
    input.val('');
    msg.css('z-index', 1)
    msg.css('opacity', 1);
    setTimeout(() => {
        msg.css('opacity', 0);
        msg.css('z-index', -1)
    }, 1500)
});