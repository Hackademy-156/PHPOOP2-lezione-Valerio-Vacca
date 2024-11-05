<?php

// PARTE ANTERIORE -> ATTACCO
abstract class Front{
    public abstract function attack();
}

// PARTE POSTERIORE -> DIFESA
abstract class Back{
    public abstract function defense();
}

// CLASSI FIGLIE DI PARTE ANTERIORE
class RocketLauncher extends Front{
    public function attack(){
        echo "Bang, bang! Missile contro il bersaglio! \n"; 
    }
}

class Gatling extends Front{
    public function attack(){
        echo "Ratatatttaataaa motherFather! Puoi dirlo forte Samir! \n";
    }
}

// CLASSI FIGLIE DI PARTE POSTERIORE
class BananaPeel extends Back{
    public function defense(){
        echo "Swish un blun7 a Swishland, sei scivolato nella trapBanana nananannanananananannaa. \n";
    }
}

class TearGas extends Back{
    public function defense(){
        echo "Sniff, sniff piangi con le cipolle di acquaviva maledetto furfante! \n";
    }
}

// andiamo a creare la batmobile

class Batmobile{
    // attributi
    public $attacco;
    public $difesa;

    // funzione costruttore
    // DEPENDENCY INJECTION -> iniezione delle dipendenze + TYPE HINTING -> io ti faccio capire che tipo di dato voglio in questa posizione, in questa variabile;
    public function __construct(Front $parteAnteriore, Back $partePosteriore){
        $this-> attacco = $parteAnteriore;
        $this-> difesa = $partePosteriore;
    }

    // creiamoci un metodo che richiami i metodi di su
    public function defense_from_enemy(){
        // FLUENT INTERFACE
        $this->difesa->defense();

        // passaggio rombi balle e lungo
        // $difesa = $this->difesa;
        // $difesa -> defense();
    }

    public function attack_enemy(){
        // FLUENT INTERFACE
        $this->attacco->attack();
    }

}

// OBJECT COMPOSITION
$batmobile1 = new Batmobile(new Gatling, new BananaPeel );

$batmobile2 = new Batmobile(new RocketLauncher, new TearGas );

$batmobile3 = new Batmobile(new Gatling, new TearGas);

$batmobile4 = new Batmobile(new RocketLauncher, new BananaPeel);

// $batmobile1 -> attack();

$batmobile1->attack_enemy();
$batmobile1->defense_from_enemy();

$batmobile4->attack_enemy();
$batmobile4->defense_from_enemy();

