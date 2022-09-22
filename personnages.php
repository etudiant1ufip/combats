<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Combats</title>
</head>
<body>
    <?php
     require( 'connexion.php ')
    ?>
    <header class="container">
        <h1>Mini jeu combats</h1>
        <nav class="nav">
            <?php

                require( 'menu.php' );


            ?>
        </nav>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-6 mt-5">
                <?php
                if( isset( $_GET['supp'] ) ) {
                    $sql = "DELETE FROM personnages WHERE id=" . $_GET['id'];
                    if(  $db->exec( $sql ) ) {
                        echo '<p> Personnage supprimé</p>';
                    } else {
                        echo '<p> Erreur lors de la suppression</p>';
                    }
                }


                $mess = '';
                if( isset( $_GET['create'] ) ) {
                    if( !empty( $_GET['nom'] ) ) {
                        $sql = 'INSERT INTO personnages (nom) VALUES ("' . $_GET['nom'] . '")';
                        if ($db->exec($sql)) {
                            $mess = 'Personnage créé !';
                        } else {
                            $mess = 'Erreur lors de la création';
                        }
                    } else {
                        $mess = 'Entrez un nom de personnage !';
                    }
                }


                ?>
                <h5>Liste des personnages</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Supp.</th>
                        <th scope="col">Personnage</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql = "SELECT * FROM personnages";
                        $response = $db->query( $sql );
                        $listPerso = $response->fetchAll();
                        foreach( $listPerso as $cle=>$perso ) {
                            echo '<tr><th scope="row">' . $perso['id'] . '</th>
                                <td><a href="personnages.php?id=' . $perso['id'] .'&supp">x</a></td>
                                </td><td>' . $perso['nom'] . '</td></tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6 mt-5">
                <h5>Ajouter un personnage</h5>
                <?php
                echo $mess;
                ?>
                <form class="row g-3" method="get" action="personnages.php">
                    <div class="col-auto">
                        <input type="hidden" value="" name="create">
                        <input type="text" class="form-control" name="nom" placeholder="Entrer un nom">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Ok</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <footer class="container">

    </footer>
</body>
</html>