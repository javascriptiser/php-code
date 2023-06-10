<?php
$root = "{$_SERVER['DOCUMENT_ROOT']}/practice_core";
$content = <<<EOD
<form action="" method="POST">
    <div class="mb-3">
        <label class="form-label">Логин</label>
        <input class="form-control" name="login">  
        <label class="form-label">Имя</label>
        <input class="form-control" name="name">
        <label class="form-label">Фамилия</label>
        <input class="form-control" name="last_name">    
        <label class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password">
        <label class="form-label">Подвтердить пароль</label>
        <input type="password" class="form-control" name="confirm_password">
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>
EOD;

require_once "$root/forms/registration_form.php";

$page = [
    'title' => 'registration',
    'content' => $content,
];
return $page;