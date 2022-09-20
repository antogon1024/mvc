<?php
use core\widgets\Menu;
$this->addCss('/web/css/mvc/index.css', 3);
?>

<h3>page index</h3>

<div class="body-content">
    <div class="row">
        <div class="col-lg-3">
            <?php echo Menu::run([
                'items' => [
                    ['label' => 'Home', 'url' => 'site/index'],
                    ['label' => 'php', 'url' => 'php/61', 'items' => [
                        ['label' => 'New Arrivals', 'url' => 'php/index'],
                        ['label' => 'Most Popular', 'url' => 'php/index', 'items' => [
                            ['label' => 'New Arrivals2222', 'url' => 'php/index'],
                            ['label' => 'New Arrivals3333', 'url' => 'php/index'],
                        ]],
                    ]],
                ]]);
            ?>
        </div>
        <div class="col-lg-9">
            <h3><?=$site['caption']?></h3>
            <?=$site['content']?>
        </div>

    </div>
</div>