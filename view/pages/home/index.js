$('.btn_get_userList').onclick = () => {
    let req = {
        action: 'list',
    };

    sendRequest('POST', BASE_URL + USERS_API, req, handleResult);

    function handleResult(response) {
        let htmls = response.userList
            .map((user) => {
                return `
            <li>
                <h2>${user.fullname}</h2>
                <p>${user.username}</p>
                <p>${user.password}</p>
            </li>
            `;
            })
            .join('');

        $('.users').innerHTML = htmls;
    }
};

$('.btn_get_user').onclick = () => {
    let username = $('.user-id').value;
    let url = BASE_URL + USERS_API + `/?username=${username}`;

    sendRequest('GET', url, {}, handleResult);

    function handleResult(response) {
        let htmls = `
            <li>
                <h2>${response.user.fullname}</h2>
                <p>${response.user.username}</p>
                <p>${response.user.password}</p>
            </li>
            `;

        $('.users').innerHTML = htmls;
    }
};
