<?php


$sql = "SELECT * FROM menu";
$response = $db->query( $sql );
$listMenu = $response->fetchAll();
foreach( $listMenu as $cle=>$menu ) {
    echo '<a class="nav-link" href="#">' . $menu['id'] . ' - ' . $menu['nom'] . '</a>';
} 