$('.btn_get_userList').onclick = () => {

    let req = {
        action: 'list',
    };

    sendRequest('POST', BASE_URL + TEST_API, req, handleResult);

    function handleResult(response) {
            
        let htmls = response.userList.map((user) => {
            return `
            <li>
                <h2>${user.fullname}</h2>
                <p>${user.username}</p>
                <p>${user.password}</p>
            </li>
            `
        }).join('');


        $('.users').innerHTML = htmls
    }
    
};
