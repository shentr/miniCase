/**
 * Created by apple on 16/10/26.
 */
$(function(){
    $("span").click(function(){
        var thisEle = $("#para").css("font-size");
        var textFontSize = parseFloat(thisEle , 10);
        var unit = thisEle.slice(-2); //获取单位
        var cName = $(this).attr("class");
        if(cName == "bigger"){
            textFontSize += 2;
        }else if(cName == "smaller"){
            textFontSize -= 2;
        }
        $("#para").css("font-size",  textFontSize + unit );
    });
});
