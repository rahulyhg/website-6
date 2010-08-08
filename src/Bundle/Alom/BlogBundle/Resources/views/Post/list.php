<?php $view->extend('PageBundle::layout') ?>

<?php $extraTitle = isset($year) ? ' - Year '.$year : ''; ?>

<?php $active = $view->get('slots')->set('menu.active', 'blog'); ?>
<?php $active = $view->get('slots')->set('head.title', 'Blog posts'.$extraTitle); ?>

<div id="block-post-list" class="page-content">

    <h1>Blog posts<?php echo $extraTitle; ?></h1>


    <div class="rich-content">

        <?php $curDate = null; ?>

        <?php foreach ($posts as $post): ?>
            <?php $date = $post->getPublishedAt()->format('F Y'); ?>
            <?php if ($date !== $curDate): ?>
                <?php if ($curDate !== null): ?>
                    </div>
                <?php endif ?>
                <h2><?php echo $curDate = $date ?></h2>
                <div class="button-set">
            <?php endif ?>

            <a class="button" href="/dev.php/blog/<?php echo $post->getSlug(); ?>"><?php echo $post->getTitle(); ?></a>
        <?php endforeach; ?>

        <?php if (null !== $curDate): ?>
            </div>
        <?php endif ?>
    </div>
</div>
