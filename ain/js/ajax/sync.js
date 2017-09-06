let xhr = new XMLHttpRequest();
xhr.open('get', 'https://code.jquery.com/jquery-3.2.1.min.js', false);
xhr.send(null);

let status = xhr.status;
if ((status >=200 && status < 300) || status === 304) {
    console.log(xhr.responseText);
} else {
    console.log('xhr sync fail');
}