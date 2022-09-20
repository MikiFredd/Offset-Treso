function flashy(message, link) {
    var template = $($('#flashy-template').html())
    $('.flashy').remove()
    template
        .find('.flashy__body')
        .html(message)
        .attr('href', link || '#')
        .end()
        .appendTo('body')
        .hide()
        .fadeIn(1200)
        .delay(5600)
        .animate(
            {
                marginTop: '-100%'
            },
            500,
            'swing',
            function() {
                $(this).remove()
            }
        )
}
