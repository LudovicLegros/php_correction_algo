<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercices PHP</title>
</head>

<body>
    <h1>Exercices PHP</h1>
    <h2>1-Boucle for</h2>
    <p>
        <?php
        //(valeur de base, condition de continuitée de la boucle, valeur d'incrémentation)
        for ($i = 0; $i <= 25; $i++) {
            echo $i . " ";
        };

        ?>
    </p>
    <h2>2-Boucle while</h2>
    <p>
        <?php
        $i = 25;
        while ($i > 0) {
            echo $i . " ";
            $i--; //ne pas oublier la valeur d'incrementation pour eviter les boucle infinies
        };
        ?>
    </p>

    <h2>3-Boucle for</h2>
    <p>
        <?php
        for ($i = 1; $i <= 25; $i++) {
            for ($n = 1; $n <= $i; $n++) {
                echo $n . " ";
            }
            echo '<br>';
        }
        ?>
    </p>

    <h2>4-Somme multiple</h2>
    <p>
        <?php
        $n = 0;
        for ($i = 1; $i <= 30; $i++) {
            $n = $n + $i;
        }
        echo $n;
        ?>
    </p>

    <h2 id="pairform">5-Fonction pair</h2>
    <p>
        <?php
        //l'argument NULL permet d'utiliser un argument facultatif
        function EstPair($number,$msg=NULL)
        {
            if ($number % 2 == 0) {
                if($msg == 1){
                    echo "Le chiffre " . $number . " est pair";
                }
                return true;

            } else {
                if($msg == 1){
                    echo "Le chiffre " . $number . " est impair";
                }
                return false;
            }
        }
        ?>
        <form action="index.php#pairform" method="POST">
            <label for="pairtest">Vérifiez votre nombre:</label>
            <input type="text" name="pairtest" id="pairtest">
            <button>vérifier</button>
        </form>
        <?php
            if(isset($_POST['pairtest'])){
                EstPair($_POST['pairtest'],1);
            } 
        ?>
    </p>

    <h2>6-Boucle pair</h2>
    <p>
        <?php
        for ($i = 1; $i <= 20; $i++) {
            if (EstPair($i)) {
                echo $i . " ";
            }
        }
        ?>
    </p>

    <h2>7-Fonction pythagore</h2>
    <p>
        <?php
        function pythagore($b, $c)
        {
            //a²=b²+c²
            //sqrt pour effectuer la racine carré du resultat
            $a = sqrt($b ** 2 + $c ** 2);
            return $a;
        }

        echo pythagore(2, 6);
        ?>
    </p>

    <h2>8-Condition heure</h2>
    <p>
        <?php
        //l'heure actuelle
        $heure = date('h') + 1;

        if ($heure > 6 && $heure < 12) {
            echo 'c\'est le matin';
        } else if ($heure >= 12 && $heure < 19) {
            echo 'c\'est l\'après midi';
        } else if ($heure >= 19 && $heure <= 24 && $heure <= 6) {
            echo 'c\'est la nuit';
        } else {
            echo 'erreur, heure non valide';
        }
        ?>
    </p>

    <h2>9-Condition ternaire</h2>
    <p>
        <?php
        //    condition  ----     Si True    ------------   Si False
        echo (EstPair(11)) ? 'le nombre est pair' : 'le nombre est impair';
        ?>
    </p>

    <h2>10-FooBar</h2>
    <p>
        <?php
        for ($i = 1; $i <= 100; $i++) {
            //Si i est un multible de 3 et 5
            //Test à effectuer en début de boucle
            if ($i % 3 == 0 && $i % 5 == 0) {
                echo 'foobar <br>';
            } else if ($i % 5 == 0) {
                echo 'bar <br>';
            } else if ($i % 3 == 0) {
                echo 'foo <br>';
            } else {
                echo $i . '<br>';
            }
        }
        ?>
    </p>

    <h2>11-Affichage de tableau</h2>
    <p>
        <?php
        $identitePersonne = [
            'nom'       => 'Croft',
            'prenom'    => 'Lara',
            'metier'    => 'Archéologue'
        ];

        echo 'C\'est un plaisir de vous voir ' . $identitePersonne['prenom'] . ' ' . $identitePersonne['nom'] . '!(' . $identitePersonne['metier'] . ')';
        ?>
    </p>

    <h2>12-Affichage spécifique de tableau</h2>
    <p>
        <?php
        $fighters = ['Zelda', 'Samus', 'Bowser', 'Peach', 'Lucina'];

        //boucle foreach($nomDuTableau as $nomADefinirParElement)
        foreach ($fighters as $fighter) {
            //strlen renvoie le nombre de lettres
            if (strlen($fighter) == 6) {
                echo $fighter . ' <br>';
            }
        }

        ?>
    </p>

    <h2>13-Recherche de la plus petite valeur dans un tableau d'entiers</h2>
    <p>
        <?php
        //rand pour des nombre aléatoire
        $nombres = [rand(1, 100), rand(1, 100), rand(1, 100), rand(1, 100)];

        //var_dump pour afficher un tableau
        var_dump($nombres);
        echo min($nombres);

        ?>
    </p>

    <h2>14-Tri d'un tableau d'entiers</h2>
    <p>
        <?php

        //Methode simple en sort (ou asort)
        //sort($nombres);
        //var_dump($nombres);

        foreach ($nombres as $nombre) {
            //plus petit nombre du tableau
            $minNombre = min($nombres);
            //la clé du plus petit nombre
            $minKey = array_search($minNombre, $nombres);
            //affichage du plus petit nombre
            echo $minNombre . ' ';
            //supression du plus petit nombre du tableau
            unset($nombres[$minKey]);
        }
        ?>
    </p>

    <h2>15-Table des multiplications</h2>
    <table>
        <?php
        for ($i = 1; $i <= 9; $i++) {
            echo '<tr>';

            for ($n = 1; $n <= 9; $n++) {
                echo '<td>' . $i * $n . '</td>';
            }

            echo '</tr>';
        }
        ?>
    </table>


 
</body>

</html>