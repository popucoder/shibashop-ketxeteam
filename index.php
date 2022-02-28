<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include_once('./view/components/Header/index.php');
    ?>

    <!-- CSS PAGE -->

</head>

<body>



    <ul class="users">

    </ul>

    <button class="btn_get_userList">Lấy danh sách user</button>
    <div></div>
    <input class="user-id" type="text" placeholder="Nhap username can lay">
    <button class="btn_get_user">Lấy user</button>

    <!-- Javascript -->
    <script src="./view/js/config.js"></script>
    <script src="./view/pages/home/index.js"></script>

    <?php
        include_once('./view/components/Footer/index.php');
    ?>

</body>

</html>