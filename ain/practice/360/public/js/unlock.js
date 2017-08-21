/**
 * Created by shentr<https://github.com/shentr/crawler.git> on 2017/3/30.
 */
(function($) {
    'use strict';
    var dom={                                       //dom缓存
        induction: $('#unlock-induction'),
        gesture:$('#unlock-gesture'),
        point1:$('#unlock-1'),
        aPoint:[],
        drawLine:document.getElementById('unlock-drawLine'),
        hint:$('#unlock-hint'),
        setPassword:$('#unlock-set-password'),
        confirmPassword:$('#unlock-confirm-password'),
        document:$(document)
    };


    function unlockModel() {                                         /*model*/
        //TODO 数据交互，model层
        var getStoragePassword,
            setStoragePassword,
            Utils
            ;
        /*常用方法*/
        Utils = (function () {
            var prefix =  'unlock_';
            var storageGetter = function (key) {
                return localStorage.getItem(prefix + key);
            };
            var storageSetter = function (key, value) {
                return localStorage.setItem(prefix + key, value);
            };
            /*localStorage取出后 字符串转数字型数组*/
            var stringToNumArray = function (string) {
                var i, arr
                    ;
                arr = string.split(',');
                for(i=0;i<arr.length;i++){
                    arr[i] = parseInt(arr[i]);
                }
                return arr;
            };
            return {                       //暴露出Util类的方法
                storageGetter:storageGetter,
                storageSetter:storageSetter,
                stringToNumArray:stringToNumArray
            }
        })();
        /*localStorage取出密码*/
        getStoragePassword = function () {
            var i,
                pwd = Utils.storageGetter('password');
            if(pwd && pwd.length>0){
                return Utils.stringToNumArray(pwd);
            }
            return null;
        };
        /*localStorage设置密码*/
        setStoragePassword = function (pwd) {
            Utils.storageSetter('password',pwd);
        };

        return {                       //暴露出Model模块的方法
            getStoragePassword: getStoragePassword,
            setStoragePassword:setStoragePassword
        }
    }

    function unlockView() {                                        /*View*/
        //TODO 渲染基本UI结构,canvas ，view层
        var Draw
            ;
        /*Draw构造函数 设置画布和画笔*/
        Draw = function (canvasElement,type) {                 //canvas对象
            if(this instanceof Draw){
                canvasElement.setAttribute('width',canvasElement.parentNode.offsetWidth);    //宽高继承父元素
                canvasElement.setAttribute('height',canvasElement.parentNode.offsetHeight);
                if(canvasElement.getContext){
                    this.ctx = canvasElement.getContext(type);
                }else{
                    alert('您的设备不支持canvas,请升级浏览器');
                }
            }else{
                return new Draw(canvasElement,type);
            }
        };
        /*两点之间画线*/
        Draw.prototype.drawLine = function (prePosX,prePosY,curPosX,curPosY,offsetWidth,offsetHeight) {
            offsetWidth = offsetWidth ? offsetWidth : 0;
            offsetHeight = offsetHeight ? offsetHeight : 0;
            prePosX-=offsetWidth;prePosY-=offsetHeight;
            curPosX-=offsetWidth;curPosY-=offsetHeight;
            this.ctx.strokeStyle = '#df3134';
            this.ctx.lineWidth = 3;
            this.ctx.lineCap = 'round';
            this.ctx.beginPath();
            this.ctx.moveTo(prePosX,prePosY);
            this.ctx.lineTo(curPosX,curPosY);
            this.ctx.stroke();
            this.ctx.closePath();
        };
        /*canvas画布清除*/
        Draw.prototype.clearAll = function () {
            this.ctx.clearRect(0,0,this.ctx.canvas.width,this.ctx.canvas.height);
        };

        return {
            Draw: Draw
        };
    }

    function eventHandler() {                                       /*control*/
        //TODO 交互的事件绑定，control层
        var data = unlockModel(),               //引入模块
            Draw = unlockView().Draw
            ;
        var aPointsPos = [],                         //定义变量 9个点位置
            pointRadius = dom.point1.width()/2,     //点的半径
            aPoint = dom.gesture.children(),        //9个点[]
            pNum = aPoint.length,                   //点的数量，可扩展(加点)
            aPassword=[],                           //密码数字数组
            tmpPassword=[],                          //保存第一次设置的密码
            draw = new Draw(dom.drawLine,'2d'),
            timer                                     //定时器
            ;
        /*9个点的位置，存入aPointsPos[]*/
        function getPointsPos() {
            var i,
                offsetX, offsetY,
                centreX, centreY
                ;
            for(i=0; i< pNum; i++){
                offsetX = dom.aPoint[i].offset().left;
                offsetY = dom.aPoint[i].offset().top;
                centreX = offsetX + pointRadius;
                centreY = offsetY + pointRadius;
                aPointsPos[i] = {
                    centreX: centreX,
                    centreY: centreY
                }
            }
        }
        /*初始化，jquery包装9个li的点，获取9点圆心位置*/
        function init() {
            var i;
            for(i=0;i<pNum;i++){
                dom.aPoint[i] = $(aPoint[i]);
            }
            getPointsPos();
        }
        /*radio状态初始化*/
        function initStatus() {
            var pwd = data.getStoragePassword();
            if(pwd){
                dom.confirmPassword.prop('checked','checked');
            }else{
                dom.setPassword.prop('checked','checked');
            }
        }
        /*3s后状态自动复原*/
        function returnInit() {
            timer = setTimeout(function () {
                dom.hint.text('请输入手势密码');
            },3000);
        }
        /*碰撞检测，触点和9个点碰撞检测*/
        function collision(touchPosX, touchPosY, callback) {
            var i,
                pointX,pointY
                ;
            for(i=0;i<pNum;i++){
                pointX = aPointsPos[i].centreX;
                pointY = aPointsPos[i].centreY;
                if((touchPosX-pointX)*(touchPosX-pointX)+(touchPosY-pointY)*(touchPosY-pointY) <= pointRadius*pointRadius){
                    callback(i);
                }
            }
        }
        /*touchstart 和 touchmove 事件处理*/
        function touchResolve(event) {
            event.preventDefault();             ///禁用手机默认的触屏滚动行为
            var i,
                curDrawCentre,
                offsetOrigin = event.originalEvent.changedTouches[0],
                touchPosX = offsetOrigin.clientX,
                touchPosY = offsetOrigin.clientY
                ;
            if(timer){
                clearTimeout(timer);
            }
            collision(touchPosX,touchPosY,function (i) {                //碰撞检测
                if(aPassword.indexOf(i) == -1){
                    dom.aPoint[i].addClass('unlock-touch-color');
                    aPassword.push(i);
                }
            });
            /*draw line*/
            var length = aPassword.length;
            if(length>0){
                curDrawCentre = aPointsPos[aPassword[length-1]];
                draw.clearAll();
                for(i=1;i<length;i++){
                    var prePointPos = aPointsPos[aPassword[i-1]],
                        curPointPos = aPointsPos[aPassword[i]];
                    draw.drawLine(prePointPos.centreX,prePointPos.centreY,curPointPos.centreX,curPointPos.centreY,0,60);
                }
                draw.drawLine(curDrawCentre.centreX,curDrawCentre.centreY,touchPosX,touchPosY,0,60);
            }
        }

        init();
        initStatus();
        dom.induction.on('touchstart',touchResolve.bind(this));
        dom.induction.on('touchmove',touchResolve.bind(this));
        dom.induction.on('touchend',function () {
            var i
                ;
            if($('input:radio[name="password"]:checked').val() === 'set'){
                if(aPassword.length<5 && aPassword.length>0){
                    if(tmpPassword.length == 0){
                        dom.hint.text('密码太短，至少需要5个点');
                    }else{
                        dom.hint.text('两次输入的不一致');
                        tmpPassword = [];
                    }
                }else if(aPassword.length>=5){
                    dom.hint.text('请再次输入手势密码');
                    if(tmpPassword.toString() === aPassword.toString()){
                        data.setStoragePassword(aPassword);
                        dom.hint.text('密码设置成功');
                        tmpPassword = [];
                        initStatus();
                    }else{
                        if(tmpPassword.length>0){
                            dom.hint.text('两次输入的不一致');
                            tmpPassword=[];
                        }else {
                            tmpPassword = aPassword;
                        }
                    }
                }
            }else if($('input:radio[name="password"]:checked').val() === 'confirm'){
                var localPwd = data.getStoragePassword();
                if(localPwd){
                    if(localPwd.toString() === aPassword.toString()){
                        dom.hint.text('密码正确！');
                    }else{
                        dom.hint.text('输入的密码不正确');
                    }
                }else{
                    dom.hint.text('请先设置密码');
                    initStatus();
                }
            }

            //收尾
            returnInit();
            draw.clearAll();
            for(i=1;i<aPassword.length;i++){
                var prePointPos = aPointsPos[aPassword[i-1]],
                    curPointPos = aPointsPos[aPassword[i]];
                draw.drawLine(prePointPos.centreX,prePointPos.centreY,curPointPos.centreX,curPointPos.centreY,0,60);
            }
            aPassword=[];
            setTimeout(function () {
                for(i=0;i<pNum;i++){
                    dom.aPoint[i].removeClass('unlock-touch-color');
                }
                draw.clearAll();
            },500);

        });
    }

    function main() {                   //入口函数
        eventHandler();
    }
    dom.document.ready(function () {
        main();
    })
})(jQuery);