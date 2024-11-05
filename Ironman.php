<?php
// TESTA -> visione
// BUSTO -> caricare e contenere energia
// BRACCIO DX -> attacco
// BRACCIO SX -> difesa
// GAMBE -> movimento


//? TESTA
abstract class Testa{
    public abstract function vision();
}

//! CLASSI FIGLIE DI TESTA
class Scansione extends Testa{
    public function vision(){
        echo "Scansiona l'area circostante in cerca di Nicola Mennona \n";
    }
}

class Jarvis extends Testa{
    public function vision(){
        echo "Jarvis non sa rispondere e chiede aiuto a chatGPT \n";
    }
}

//? BUSTO
abstract class Busto{
    public abstract function energy();
}

//! CLASSI FIGLIE DI BUSTO
class ReattoreArk extends Busto{
    public function energy(){
        echo "Il cuore dell'armatura genera energia puura \n";
    }
}

class Fotovoltaico extends Busto{
    public function energy(){
        echo "Tramite il fotovoltaico oggi può farsi una lavatrice in più \n";
    }
}

//? BRACCIO DX
abstract class BraccioDx{
    public abstract function attack();
}

//! CLASSI FIGLIE DI BRACCIO DX
class Laser extends BraccioDx{

    public $charges = 5;

    public function attack(){
        echo "Pciù, Pciù! Dal palmo della mano emette un laser che infligge danni a Nicola Menonna \n";
        $this->charges--;
    }
}

class Rocket extends BraccioDx{
    public function attack(){
        echo " Kabooom! Dal palmo della mano vien fuori un razzo. Se non hai un disinnesgatto, sei morto! \n";
    }
}

//? BRACCIO SX
abstract class BraccioSx{
    public abstract function defense();
}

//! CLASSI FIGLIE DI BRACCIO SX
class Scudo extends BraccioSx{
    public function defense(){
        echo "Si difende facendo comparie un mega scudo! Che Aulab potentissima! \n";
    }
}

class EMP extends BraccioSx{
    public function defense(){
        echo "Genera impulsi elettromagnetici che spengono tutti i Nokia 3330 nel mondo! \n";
    }
}

//? GAMBE
abstract class Gambe{
    public abstract function movement();
}

//! CLASSI FIGLIE DI GAMBE
class SuperVelocita extends Gambe{
    public function movement(){
        echo "Non skippa il leg day! Corre veloce sul lungomare di Bari! \n";
    }
}

class Propulsori extends Gambe{
    public function movement(){
        echo "Verso l'infinito e oltre, ma poi ho preso er muro. Doveva annà così, fratellì! \n";
    }
}

// ARMATURA DI IRONMAN IL PIACIONE
class Armatura{
    // testa, busto, bracciodx, bracciosx, gambe

    public $testa;
    public $busto;
    public $braccioDx;
    public $braccioSx;
    public $gambe;

    public function __construct(Testa $head, Busto $body, BraccioDx $armDx, BraccioSx $armSx, Gambe $legs){
        // nell'attributo testa, della classe Armatura, verrà inserito un oggetto di classe Testa -> Dependency Injection
        $this-> testa = $head; 
        $this-> busto = $body;
        $this-> braccioDx = $armDx;
        $this-> braccioSx = $armSx;
        $this-> gambe = $legs;
    }

    // metodi -> visione, energia, attacco, difesa e movimento

    public function armatura_visione(){
        $this->testa->vision();
    }

    public function armatura_energia(){
        $this->busto->energy();
    }

    public function armatura_attacco(){
        $this->braccioDx->attack();
    }

    public function armatura_difesa(){
        $this->braccioSx->defense();
    }

    public function armatura_movimento(){
        $this->gambe->movement();
    }

}


// OBJECT COMPOSITION

$mk1 = new Armatura(new Jarvis, new Fotovoltaico, new Laser, new Scudo, new Propulsori);
$mk1->armatura_attacco();
$mk1->armatura_difesa();
$mk1->armatura_visione();
$mk1->armatura_movimento();
$mk1->armatura_energia();