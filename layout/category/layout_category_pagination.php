<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 16:40
 */

class layout_category_pagination extends layout
{

    function __construct()
    {

    }

    public function render()
    {
        ?>
        <ul class="page-numbers">
            <li><span class="page-numbers current">1</span></li>
            <li><a class="page-numbers" href="#">2</a></li>
            <li><a class="page-numbers" href="#">3</a></li>
            <li><a class="page-numbers" href="#">4</a></li>
            <li><a class="page-numbers" href="#">Next</a></li>
        </ul>
        <?php
    }

}