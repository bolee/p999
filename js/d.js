jQuery(function($){
    //问题补充
    $('.post-cell-supply').click(function(){
        //计算总宽度跟高度
        $(".post-supply").css({'left':(parseInt($('body').css('width'))-410)/2 + 'px','top':200,'display':'block'})
        $(".post-supply-zindex").css({'height':$('body').css('height'),'display':'block'})
        //获取表单的的ID
        var type_id = $(this).attr('id');
        $(".post-supply form").submit(function(){
            $.ajax({
                'type':'POST',
                'url':$(this).attr('action'),
                'data':{'content':$(this).children('textarea').val(),'type_id':type_id},
                'dataType':'json',
                success:function(data){
                    if(data)
                    {

                    }
                    $(".post-supply").css({'display':'none'})
                    $(".post-supply-zindex").css({'display':'none'})
                }
            })
            return false;
        })
    })
    $(".post-supply-zindex").click(function(){
        $(".post-supply").css({'display':'none'})
        $(".post-supply-zindex").css({'display':'none'})
    })
})