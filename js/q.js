jQuery(function($){
    var rHtml = function(t){
        try{
            $(t).html($(t).html().replace(/<(.*?)>/g,"&lt;$1&gt;"))
        } catch (e) {
        }
    }
    $.each($(".question-list h3"),function(i,v){
        rHtml($(v).find('a'))
    })
    rHtml($('.post-title'))

})