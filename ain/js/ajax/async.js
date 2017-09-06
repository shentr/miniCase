let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    let readyState = xhr.readyState;
    console.log(readyState);    //因open同步,所以listen不到readyState 0->1
    if (readyState === 4) {
        let status = xhr.status;
        if ((status >=200 && status < 300) || status === 304) {
            console.log(xhr.getAllResponseHeaders(), xhr.responseText);
        } else {
            console.log('xhr sync fail');
        }
    }
};
/* get */
// xhr.open('get', 'https://code.jquery.com/jquery-3.2.1.min.js', true);  //open()同步
// xhr.send(null);                         //send()异步

/* post form xhrI */
// xhr.open('post', 'https://user.qunar.com/mobile/std/identity/auth.jsp', true);
// xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
// xhr.send(null);

/* post form xhrII */
xhr.open('post', 'https://user.qunar.com/mobile/std/identity/auth.jsp', true);
let data = new FormData(document.forms[0]);
data.append('', '');
xhr.send(data);

