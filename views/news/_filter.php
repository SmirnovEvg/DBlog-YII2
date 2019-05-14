












<?php foreach ($category as $categorys) { ?>

            <div class="post1">
                <?php
                if ($categorys->language == 'c_plus') {
                    echo "C++";
                } elseif ($categorys->language == 'c_sharp') {
                    echo "C#";
                } else {
                    ?>
                    <?= Html::a($categorys->language, ['index', 'language' => $categorys->language]) ?>
                <?php
            }
            ?>
            </div>
        <?php } ?>