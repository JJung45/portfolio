 
var ulMenuLi=$('.ulMenu>ul>li');
    
    ulMenuLi.on('click',function(){
        $(this).addClass('plus').siblings().removeClass('plus');
    })