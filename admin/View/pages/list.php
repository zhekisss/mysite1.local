<?php $this->header(); ?>
<div id="content">
<h1>LIST</h1>
<?php
$count = 1;
foreach ($this->page->getPages() as $page) :
?>
<p><a href="/admin/<?= $page->name; ?>"><?= $count++ . '. ' . $page->name . ' - ' . $page->time ?></a></p>
<?php
    // foreach ($page as $key => $value) :
    //     echo "$key = $value <br>";
    // endforeach;
endforeach;
?>
</div>
<?php $this->footer(); ?>