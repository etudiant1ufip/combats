<?php

$basePath = $_SERVER['HTTP_REFERER'];

$sql = "SELECT * FROM menu";
$response = $db->query( $sql );
$listMenu = $response->fetchAll();
foreach( $listMenu as $cle=>$menu ) {
    $nomScript = '#';
    if(  !empty( $menu['script'] ) ) {
        $nomScript = $basePath . $menu['script'];
    }
    echo '<a class="nav-link" href="' . $nomScript . '">' . $menu['id'] . ' - ' . $menu['nom'] . '</a>';
} 