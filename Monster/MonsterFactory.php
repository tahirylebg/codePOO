<?php

class MonsterFactory
{
    /*
        * La méthode createMonster est une méthode statique qui prend en paramètre le type de monstre à créer et le niveau du monstre.
        * En fonction du type de monstre demandé, elle instancie et retourne un objet correspondant (Goblin, Orc ou Dragon).
        * Si le type de monstre n'est pas reconnu, elle lance une exception InvalidArgumentException.
        */
    public static function createMonster(string $type, int $level): Monster
       {
        // On a choisi d'utiliser un switch pour gérer la création des différents types de monstres, ce qui rend le code plus lisible et facile à maintenir.
        switch (strtolower($type)) {

            case 'goblin':
                return new Goblin($level);

            case 'orc':
                return new Orc($level);

            case 'dragon':
                return new Dragon($level);

            default:
                throw new Exception("Type de monstre inconnu : " . $type);
        }
    }


     /**
     * Crée un monstre aléatoire selon le niveau.
     */
    public function createRandomMonster(int $level): Monster{
    // On utilise random pour générer un nombre aléatoire entre 1 et 3, qui correspondra à un type de monstre (1 pour Goblin, 2 pour Orc, 3 pour Dragon).
    $random = rand(1, 3);

    if ($random === 1) {
        return new Goblin($level);
    }
    if ($random === 2) {
        return new Orc($level);
    }
    else {
        return new Dragon($level);
    }
    }

}