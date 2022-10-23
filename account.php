<?php

require_once __DIR__ . "/config/boot.php";
include __DIR__ . "/header.php"; ?>
    <div class="container account_container">
        <h2>Обновление аккаунта</h2>
        <form id="update_account_form">
            <div class="form-group">
                <label for="firstname">Имя</label>
                <input type="text" class="form-control" name="firstname" id="firstname" required value="` + result.data.firstname + `" />
            </div>

            <div class="form-group">
                <label for="lastname">Фамилия</label>
                <input type="text" class="form-control" name="lastname" id="lastname" required value="` + result.data.lastname + `" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required value="` + result.data.email + `" />
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>

            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </form>
    </div>
<?php
include __DIR__ . "/footer.php";