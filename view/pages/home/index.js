$('.btn_get_userList').onclick = () => {

    let req = {
        action: 'list',
    };

    sendRequest('POST', BASE_URL + TEST_API,
    req, 
    function(response) {
        console.log(response);
    });

    
};
