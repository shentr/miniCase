/**
 * Created by apple on 17/1/4.
 */

self.onmessage = function(e){
    var str = e.data;

    self.postMessage(str+" hehe");

}
