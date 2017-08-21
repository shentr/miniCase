/**
 * Created by apple on 17/1/4.
 */
var worker = new Worker('task.js');

worker.onmessage = function(e){
    alert(e.data);
}
worker.postMessage('haha');
//alert('hahaha');s

console.log("哈哈");