//=====================API===========================
//BASE URL API
const BASE_URL = 'http://localhost/shibashop-ketxeteam/';

//USERS API
const USERS_API = 'api/v1/users.php';

//Action

//Authen API
const API_AUTHEN = 'api/v1/authen.php';
// Action
const AUTHEN_LOGIN = 'login';
const AUTHEN_REGISTER = 'register';
const AUTHEN_USER_LIST = 'list';

//Product API

//=====================DOM===========================
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

//======================AJAX===========================
function sendRequest(method, url, data, callback) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = handleResult;
    xhr.open(method, url);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    data = Object.entries(data).reduce((acc, curr) => {
        if (acc == '') return curr[0] + '=' + curr[1];
        return acc + '&' + curr[0] + '=' + curr[1];
    }, '');

    xhr.send(data);

    function handleResult() {
        if (this.readyState == 4 && this.status == 200) {
            callback(JSON.parse(xhr.response));
        }
    }
}
