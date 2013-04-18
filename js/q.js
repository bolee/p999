jQuery(function($){
    $('.q-list li').mouseenter(function(){
        $(this).css('background-color','#ddd')
    }).mouseleave(function(){
            $(this).css('background-color','#fff')
        })
})