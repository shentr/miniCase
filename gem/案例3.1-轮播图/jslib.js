function animate(elem, attr, callback){
	clearInterval(elem.timer);
	elem.timer = setInterval(function(){
		var bStop = true;//一个标识位，true代表可以停止定时器，false代表不可不停止
		for(var prop in attr){//1:width
			var curr = parseInt(getStyle(elem, prop));
            /*if(prop==="left")
				console.log(curr);*/
			if(prop == 'opacity'){										///消除浮点精度
				curr = parseInt(getStyle(elem, prop)*100);
				//console.log(curr);
			}
			var speed = (attr[prop] -  curr) / 60;
			//console.log(1+":"+speed)
			speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
            //console.log(2+":"+speed)
			if(curr != attr[prop]){
				bStop = false;
			}
			
			if(prop == 'opacity'){
				elem.style.opacity = (curr + speed) / 100;
				elem.style.filter = 'alpha(opacity='+(curr + speed)+')';			///for IE
			}else{
				elem.style[prop] = curr + speed + 'px';
			}
		}
		if(bStop){
			clearInterval(elem.timer);
			callback && callback();
		}
	}, 1);
}

function getStyle(elem, attr){
	//console.log(getComputedStyle(elem, false)[attr]);
	if(elem.currentStyle){											/// for IE
		return elem.currentStyle[attr];
	}else{
		return getComputedStyle(elem, false)[attr];			///获取Style，只读
	}
}