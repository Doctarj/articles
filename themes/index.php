<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.08.2016
 * Time: 16:03
 *  */
require_once 'model.php';

?>
<div class="panel panel-default">
    <div class="panel-heading">
        Articles list
    </div>
    <div class="panel-body">
        <ul class="list-group">


            <?php foreach ($short_articles as $article): ?>

                <li class="list-group-item list-group-item-info"><a
                        href="?ctrl=editor&act=show&actcom=show&id=<?php echo $article['id_article'] ?>">

                        <?php echo $article['content'] . "   " ?><br>
                        <i>  <?php echo $article['date'] ?> </i>
                    </a>
                </li>
            <?php endforeach ?>

        </ul>

        <div class="row">
<!--            <div class="col-md-12 text-center">-->
<!--                <ul class="pagination">-->
<!--                    --><?php
//                    for ($i = 1; $i <= $pageTotal; $i++) { ?>
<!---->
<!--                        <li><a href="?pageNum=--><?php //echo "$i" ?><!--">--><?php //echo "$i" ?><!--</a></li>-->
<!---->
<!--                    --><?php //} ?>
<!--                </ul>-->
<!--            </div>-->
        </div>
    </div>
</div>
