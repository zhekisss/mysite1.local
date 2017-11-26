<?php $this->header(); ?>

<div id="content">
<h1>LIST</h1>

<?php
$count = 1;
foreach ($this->user->getUsers() as $page) :
?>
<p><a href="/admin/user/<?= $page->name; ?>"><?= $count++ . '. ' . $page->name . ' - ' . $page->time ?></a></p>
<?php
    // foreach ($page as $key => $value) :
    //     echo "$key = $value <br>";
    // endforeach;
endforeach;
?>
</div>
<?php $this->footer(); ?>