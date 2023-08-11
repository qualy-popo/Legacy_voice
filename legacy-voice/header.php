<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package legacy-voice
 */

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>ページタイトル</title>
    <meta name="description" content="ページの説明" />
    <meta name="format-detection" content="telephone=no" />

    <!-- favicon/webclipicon -->
    <link rel="icon" href="favicon.ico" />
    <link rel="icon" href="favicon.svg" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="webclip.png" />

    <!-- ogp -->
    <meta property="og:site_name" content="サイト名" />
    <meta property="og:url" content="URL" />
    <meta property="og:type" content="website or article" />
    <meta property="og:title" content="ページのタイトル" />
    <meta property="og:description" content="ページの説明" />
    <meta property="og:image" content="URL" />
    <meta property="og:locale" content="ja_JP" />
    <!-- <meta property="fb:app_id" content="AppID"> -->
    <meta name="twitter:card" content="summary_large_image or summary" />
    <!-- <meta name="twitter:site" content="@moshamusha2010" /> -->
    <meta name="twitter:description" content="ページの説明" />
    <meta name="twitter:image:src" content="URL" />

    <!-- css -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/import.css" />

    <!-- js -->
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery-3.4.1.min.js" defer></script>

    <!-- 場合によって必要 -->
    <!-- <meta name="robots" content="noindex,nofollow"> -->
  </head>
  <body>