<?php

if(!empty($_SESSION)){
    ?>

<a href="auth.php">Выход</a>
 <?php }
 else{
?>

<h1>Авторизация</h1> <br/><br/>

<form  action="../index.php?ctrl=users&act=auth" method="post">

        <label>Email</label>

            <input type="email"   name = "email" placeholder="Email">


        <label >Password</label>

            <input type="password"  name = "password" placeholder="Password">



                <label>
                    <input type="checkbox" > Remember me
                </label>


            <button type="submit" class="btn btn-default">Sign in</button>

</form>

<a href="registry.php"><button>Registry</button></a>

<?php }?>