<?php
$categories = [];
foreach($post->getCategories() as $category) {
    $url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
    $categories[] = <<<HTML
    <a href="{$url}">{$category->getName()}</a>
HTML;
}
dd(implode(', ', $categories));
// On cree un tableau contenant la syntaxe HTML d'un lien
// [
//   '<a href="/category/123">Categories</a>',
//  '<a href="/category/123">Categories</a>',
//  '<a href="/category/123">Categories</a>',
//  '<a href="/category/123">Categories</a>',
// ]
// On regroupe les elements du tableau avec une ,
?>

<div class="card mb-3">
            <div class="card-body">
            <h5 class="card-title"><?= htmlentities($post->getName()) ?></h5>
            <p class="text-muted">
                <?= $post->getCreatedAt()->format('d F Y H:i') ?>::
                    <?= implode(', ', $categories) ?>
            </p>
            <p><?= $post->getExcerpt() ?></p>
            <p>
                <a href="<?= $router->url('post',['id' => $post->getId(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Voir plus</a>
            </p>
            </div>
        </div>