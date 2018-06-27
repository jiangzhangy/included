/*
w:提示文本
*t:提示框类型 0成功,1警告
*url:刷新地址
* f:回调函数
* */
function opt_tips(options){
    var settings= $.extend({w:'操作提示',t:'',url:'',f:function(){}},options);
    if(!document.getElementById('alert_box')){
        $('body').append('<div id="alert_box"></div>')
    };
    $('#alert_box').text(settings.w);
    $('#alert_box').css('margin-top','-'+($('#alert_box').height()/2+25)+'px');
    $('#alert_box').css('background','rgba(0,0,0,.6)');
    if(settings.t==0){$('#alert_box').css('background','rgba(36,162,89,.6)');}
    if(settings.t==1){$('#alert_box').css('background','rgba(254,126,0,.6)');}
    if(settings.t==2){$('#alert_box').css('background','rgba(254,126,0,.6)');}
    $('#alert_box').animate({top:'50%'});
    setTimeout(function(){$('#alert_box').animate({top:'-100%'},function(){
        $('#alert_box').remove();
        if(settings.url!=''){document.location=settings.url;}
        settings.f();
    });
    },2000);
}
//确认窗
function confirm(e,callBack){
    if(!document.getElementById('confirm_box')){
        $('body').append('<div id="confirm_box"><div></div><p class="cl btnBox"><button class="yes f-l">确认</button><button class="no f-r">取消</button></p></div>')
    };
    var toback=false;
    $('#confirm_box div').text(e);
    $('#confirm_box').css('margin-top','-'+($('#alert_box').height()/2+25)+'px');
    $('#confirm_box').animate({top:'50%'});
    $('#confirm_box button').click(function(){$('#confirm_box').animate({top:'-100%'},function(){$('#confirm_box').remove();});});

    $('#confirm_box .yes').click(function(){callBack()});
    $('#confirm_box .yes').click(function(){toback=false;});
    return toback;

}
//回调返回
function opt_ok_return(d){
    if(d.s==0){
        opt_tips({w: d.msg,t: d.s,url: d.url});
    }else{
        opt_tips({w: d.msg,t: d.s,url: d.url});
    }
}


//表单提交
//ajax提交表单
function ajaxform(obj,callbak){
        var data=$(obj).serialize();
        var url=$(obj).attr('action');
        $.post(url,data,callbak,'json');
    return false;
}
