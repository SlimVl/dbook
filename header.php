<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/dbook/assets/css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="http://localhost/dbook/assets/js/main.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <title>Моя тестовая страница</title>
    </head>
    <?php
        include_once "config/boot.php";
        include_once "authentication-jwt/api/Objects/User.php";

        $database = new Database();
        $db = $database->getConnection();
        $user = new User($db);
    ?>
    <body>
        <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/dbook/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img class="site-logo" src="/dbook/assets/img/Memory-Book-Concept-Logo.png">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
<!--                <li><a href="/dbook/" class="nav-link px-2 text-secondary">Home</a></li>-->
                <?php if ($user->is_admin()) { ?>
                <li><a href="/dbook/photos.php" class="nav-link px-2 text-white" id="photos">Photos</a></li>
                <li><a href="/dbook/admin/" class="nav-link px-2 text-white">Admin</a></li>
                <?php } ?>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <?php if (!empty(htmlspecialchars($_COOKIE["jwt"]))) { ?>
                <button type="button" class="btn btn-outline-light me-1" id="update_account">Account</button>
<!--                <a href="/dbook/account.php" class="btn btn-outline-light me-1" id="update_account">Account</a>-->
                <button type="button" class="btn btn-outline-light me-3 as" id="logout">Logout</button>
                <?php } else { ?>
<!--                <button type="button" class="btn btn-outline-light me-2" id="login">Login</button>-->
                <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" id="login_modal">Login</button>
<!--                <button type="button" class="btn btn-warning" id="sign_up">Sign-up</button>-->

                <?php } ?>
            </div>
            </div>
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Авторизация</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="login_form">
                                <div class="form-group">
                                    <label for="email">Email адрес</label>
                                    <input type="email" class="form-control" name="email" placeholder="Введите email">
                                </div>

                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="password" class="form-control" name="password" placeholder="Введите пароль">
                                </div>

                                <button type="submit" class="btn btn-primary">Войти</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Регистрация</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel2">Регистрация</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="sign_up_form">
                                <div class="form-group">
                                    <label for="firstname">Имя</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" required />
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Фамилия</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" required />
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required />
                                </div>

                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="password" class="form-control" name="password" id="password" required />
                                </div>

                                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Авторизация</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </header>
