<?php
    session_start();
    # Entwicklermodus
    ini_set( 'display_errors', true );
    error_reporting( E_ALL );

    $monitor_active = '';
    $diagrams_active = '';
    $settings_active = '';
    $logs_active = '';

    if ($_SERVER['PHP_SELF'] == '/index.php') {
        $monitor_active = "active";
    }
    elseif ($_SERVER['PHP_SELF'] == '/diagrams.php') {
        $diagrams_active = "active";
    }
    elseif ($_SERVER['PHP_SELF'] == '/settings.php') {
        $settings_active = 'active';
    }
    elseif ($_SERVER['PHP_SELF'] == '/logs.php') {
        $logs_active = 'active';
    }
    elseif ($_SERVER['PHP_SELF'] == '/changelog.php') {
        $changelogs_active = 'active';
    }
    # Auslesen der Version aus dem Changelog
    # Lese 14 Zeichen, beginnend mit dem 21. Zeichen
    $changelogfile = 'changelog.txt';
    $erste_Zeile = fopen($changelogfile,"r"); # Oeffnet die Datei changelog.txt
    $piager_version = fgets($erste_Zeile, 4096); # liest die erste Zeile bzw. bis Zeichen 4096 aus. je nachdem was zuerst eintritt
    #$rssversion = file_get_contents('$changelogfile', NULL, NULL, 0, 12); # Alternative über Inhalt auslesen. Zeile 0 bis Zeichen 12
    
    # Language festlegen
    $language = 'de_DE.utf8';
    putenv("LANG=$language"); 
    setlocale(LC_ALL, $language);

    # Set the text domain as 'messages'
    $domain = 'pi-ager';
    bindtextdomain($domain, "/var/www/locale"); 
    textdomain($domain);
?>
<!DOCTYPE HTML>
<html>
    <meta http-equiv="content-type" content="text/html;  charset=utf-8">
    <?php 
        if ($_SERVER['PHP_SELF'] != '/settings.php') {
        echo "<meta http-equiv=\"refresh\" content=\"120\" />";
        }
    ?>
    <head>
        <title>Pi-Ager</title>
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
        <link href="css/style_rss.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="css/style.css" media="screen">
        <!--[if lte IE 7]><link rel="stylesheet" href="css/style.ie7.css" media="screen" /><![endif]-->
        <link rel="stylesheet" href="css/style.responsive.css" media="all">
        <script src="js/jquery.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/script.js"></script>
        <script src="js/script.responsive.js"></script>
    </head>
    <body>
        <div id="art-main">
            <header class="art-header">
                <div class="art-shapes">
                    <div class="art-object0"></div>
                </div>
                <h1 class="art-headline">Pi-Ager</h1>
                <h2 class="art-slogan">Nach Grillsportverein</h2>
                <nav class="art-nav">
                    <div class="art-nav-inner">
                        <ul class="art-hmenu">
                            <li><a href="index.php" class="<?php echo $monitor_active; ?>"><?php echo _('Monitor'); ?></a></li>
                            <li><a href="diagrams.php" class="<?php echo $diagrams_active; ?>"><?php echo _('Diagamme'); ?></a></li>
                            <li><a href="settings.php" class="<?php echo $settings_active; ?>"><?php echo _('Einstellungen'); ?></a></li>
                            <li><a href="logs.php" class="<?php echo $logs_active; ?>"><?php echo _('Logs'); ?></a></li>
                            <?php 
                                if ($_SERVER['PHP_SELF'] == '/changelog.php') {
                                    echo '<li><a href="changelog.php" class="';
                                    echo $changelog_active;
                                    echo '">';
                                    echo _('Changelog');
                                    echo '</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="art-sheet clearfix">
                <div class="art-layout-wrapper">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <div class="art-layout-cell art-content">