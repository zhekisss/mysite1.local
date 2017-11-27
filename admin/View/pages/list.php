<?php $this->header(); ?>
<div id="content" class="container">


<table class="highlight">
        <thead>
            <tr>
                <th>
                    Страницы
                </th>
                <th>
                    Категория
                </th>
                <th>
                    Время
                </th>
            </tr>
        </thead>

<?php
$count = 1;
foreach ($this->page->getPages() as $page) :
?>
    <tr>
        <td>
            <a href="/admin/<?= $page->name; ?>"><?= $count++ . '. ' . $page->name; ?></a>
        </td>
        <td>
            <?= $page->category; ?>
        </td>
        <td>
        <?= $page->time ?>
        </td>
    </tr>
    
    <?php
    // foreach ($page as $key => $value) :
        //     echo "$key = $value <br>";
        // endforeach;
    endforeach;
    ?>

    </table>
</div>
<?php $this->footer(); ?>