(function(){
    var oBigImg = document.getElementById("big-img");
    var aBigPic = oBigImg.getElementsByTagName("img");
    var oSmallImg = document.getElementById("small-img");
    var aSmallPic = oSmallImg.getElementsByTagName("img");
    var oPrev = document.getElementById("prev");
    var oNext = document.getElementById("next");
    var oInfo = document.getElementById("info");
    var oCurrentPage = document.getElementById("current-page");
    var oContainer = document.getElementById("container");
    var iNow = 0;
    var zIndex = 9;
    var timer;
    // for(var i=0; i<aBigPic.length; i++){
    //     aBigPic[i].style.zIndex = aBigPic.length - i;
    // }

    for(var i=0; i<aSmallPic.length; i++){
        aSmallPic[i].className = "small-opacity";
    }
    aSmallPic[iNow].className = "selected";

    oPrev.onmouseover = oNext.onmouseover = function(){
        animate(this, {
            opacity : 100
        });
    };
    oPrev.onmouseout = oNext.onmouseout = function(){
        animate(this, {
            opacity : 0
        });
    };
    oPrev.onclick = oNext.onclick = function(){
        if(this == oNext){
            iNow++;
            if(iNow == aBigPic.length){
                iNow = 0;
            }
        }else{
            iNow--;
            if(iNow == -1){
                iNow = aBigPic.length - 1;
            }
        }
        changeImg(iNow);
    };

    for(var i=0; i<aSmallPic.length; i++){
        aSmallPic[i].index = i;
        aSmallPic[i].onmouseover = function(){
            animate(this, {
                opacity: 100
            });
        };
        aSmallPic[i].onmouseout = function(){
            if(this.index != iNow){
                animate(this, {
                    opacity: 30
                });
            }
        };
        aSmallPic[i].onclick = function(){
            if(this.index != iNow){
                changeImg(this.index);
            }
        };
    }

    run();
    oContainer.onmouseover = function(){
        clearInterval(timer);
    };
    oContainer.onmouseout = function(){
        run();
    };

    function run(){
        timer = setInterval(function(){
            oNext.onclick();
        }, 1000);
    }
    function changeImg(index){
        iNow = index;
        aBigPic[index].style.opacity = 0;
        aBigPic[index].style.filter = "alpha(opacity=0)";
        aBigPic[index].style.zIndex = zIndex++;
        animate(aBigPic[index], {
            opacity: 100
        });
        oPrev.style.zIndex = oNext.style.zIndex = oInfo.style.zIndex = zIndex++;
        oCurrentPage.innerHTML = index + 1;

        for(var i=0; i<aSmallPic.length; i++){
            aSmallPic[i].style.opacity = .3;
            aSmallPic[i].style.filter = "alpha(opacity=30)";
        }
        aSmallPic[index].style.opacity = 1;
        aSmallPic[index].style.filter = "alpha(opacity=100)";

        var iLeft = 0;
        if(index == 0 || index == 1){
            iLeft = 0;
        }else if(index == aSmallPic.length - 1 || index == aSmallPic.length - 2){
            iLeft = aSmallPic.length / 2;
        }else{
            iLeft = index - 1;
        }
        animate(oSmallImg, {
            left: -iLeft * aSmallPic[0].offsetWidth
        })

    }

    // 0   0*width
    // 1   0*width
    //
    // 2   1*width
    // 3   2*width
    // 4   3*width
    // 5   4*width
    //
    // 6   4*width
    // 7   4*width




})();


