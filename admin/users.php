<?php
// файлы, необходимые для подключения к базе данных
include_once "../config/boot.php";
include_once "../authentication-jwt/api/Objects/User.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// создание объекта "User"
$user = new User($db);

?>
<ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small" id="admin_menu">
    <li>
        <a href="#" class="nav-link text-secondary">
            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg>
            Home
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white">
            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"></use></svg>
            Dashboard
        </a>
    </li>
    <li>
        <a href="/dbook/admin/users.php" class="nav-link text-white">
            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"></use></svg>
            Users
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white">
            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"></use></svg>
            Products
        </a>
    </li>
    <li>
        <a href="#" class="nav-link text-white">
            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"></use></svg>
            Customers
        </a>
    </li>
</ul>
<?php include __DIR__ . "/../header.php"; ?>
<div class="px-3 py-2 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>


        </div>
        <div class="all_users">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">ID</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $users = $user->all_users();
                    $i = 1;
                    foreach ($users as $user) { ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <th><?php echo $user["id"] ?></th>
                            <td><?php echo $user["firstname"] ?></td>
                            <td><?php echo $user["lastname"] ?></td>
                            <td><?php echo $user["email"] ?></td>
                        </tr>
                   <?php
                    $i = $i + 1;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
