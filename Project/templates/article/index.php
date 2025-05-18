<?php require(dirname(__DIR__).'/header.php'); ?>
<?php foreach($articles as $article): ?>
<article>
    <a class="title" href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId()?>"><?=$article->getName();?></a>
    <div class="meta">Опубликовано <?=$article->getCreatedAt();?> автором <?=$article->getAuthor()->getName();?></div>
    <p><?=$article->getText();?></p>
</article>
<?php endforeach ?>
<a class="btn-add" href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/create">Добавить</a>

<?php require(dirname(__DIR__).'/footer.php'); ?>