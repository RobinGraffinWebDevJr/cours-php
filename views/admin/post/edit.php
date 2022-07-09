<?php
use App\Connection;
use App\Table\PostTable;
use App\Validator;
use App\HTML\Form;

$pdo = Connection::getPDO();
$postTable = new PostTable($pdo);
$post = $postTable->find($params['id']);
$success = false;

$errors = [];

if (!empty($_POST)) {
    Validator::lang('fr');
    $v = New Validator($_POST);
    $v->rule('required', 'name');
    $v->rule('lengthBetween', 'name', 3, 200);
    $post->setName($_POST['name']);
    if ($v->validate()) {
        $postTable->update($post);
        $success = true;
    } else {
      $errors = $v->errors();
    }
}
$form = new Form($post, $errors);
?>

<?php if ($success): ?>
<div class="alert alert-success">
    L'article a bien été modifié 
</div>
<?php endif ?>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    L'article n'a pas pu être modifié, merci de corriger vos erreurs
</div>
<?php endif ?>

<h1>Editer l'article <?= e($post->getName()) ?></h1>

<form action="" method="POST">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'URL'); ?>
    <?= $form->textarea('content', 'Contenu'); ?>
    <button class="btn btn-primary">Modifier</button>
</form>