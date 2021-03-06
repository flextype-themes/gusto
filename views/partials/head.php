<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry, Assets\Assets, Text\Text, Html\Html};
?>
<!doctype html>
<html lang="<?= Registry::get('settings.locale') ?>">
  <head>
    <meta charset="<?= Text::lowercase(Registry::get('settings.charset')) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= (isset($page['description']) ? Html::toText($page['description']) : Html::toText(Registry::get('settings.description'))) ?>">
    <meta name="keywords" content="<?= (isset($page['keywords']) ? $page['keywords'] : Registry::get('settings.keywords')) ?>">
    <meta name="robots" content="<?= (isset($page['robots']) ? $page['robots'] : Registry::get('settings.robots')) ?>">
    <meta name="generator" content="Powered by Flextype <?= Flextype::VERSION; ?>" />

	<?php Event::dispatch('onThemeMeta'); ?>

	<title><?= Html::toText($page['title']); ?> | <?= Html::toText(Registry::get('settings.title')) ?></title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

    <?php Assets::add('css', Http::getBaseUrl() . '/site/themes/' . Registry::get('settings.theme') . '/assets/css/bootstrap.min.css', 'site', 1) ?>
    <?php Assets::add('css', Http::getBaseUrl() . '/site/themes/' . Registry::get('settings.theme') . '/assets/css/style.css', 'site', 2) ?>
    <?php foreach(Assets::get('css', 'site') as $assets_by_priorities): ?>
        <?php foreach($assets_by_priorities as $assets): ?>
            <link href="<?= $assets['asset']; ?>" rel="stylesheet">
        <?php endforeach ?>
    <?php endforeach ?>

    <?php Event::dispatch('onThemeHeader') ?>
  </head>
  <body>
  <!-- Header -->
  <header id="header">
    <div class="intro">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="intro-text">
              <h1><?= $page['title'] ?></h1>
              <p><?= $page['message'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php Themes::view('partials/navigation')->display() ?>
  <main>
