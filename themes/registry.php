<?php
?>
<div id="registry">
<h1>Регистрация</h1>
<form action="../index.php?ctrl=users&act=new" method="post">

    <input type="text" name="login"  placeholder="Login"><br/><br/>
    <input type="password" name="password"  placeholder="Password"><br/><br/>
    <input type="password" name="rePassword"  placeholder="Repassword"><br/><br/>
    <input type="email" name="email"  placeholder="E-mail"><br/><br/>
    <input type="submit" value="Зарегистрироваться"><br/><br/>

</form>
</div>