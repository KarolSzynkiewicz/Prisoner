<?php


    class BoxRoom
{

    public $amount_of_prisoners;
    public $amount_of_boxes;
    public $allowed_attemps_for_prisoner;
    public $shuffledBoxes = array();
    public $queue = array();
    public $amount_of_simulations;
    public $describe=0;
    public $describe2=0;
    public $describe3=0;
    public $describe4=0;



    function __construct($amount, $simulations)
    {
        $this->amount_of_boxes=$amount;
        $this->amount_of_prisoners=$amount;
        $this->allowed_attemps_for_prisoner = $amount/2;
        $this->queue= range(1,$amount);
        $this->amount_of_simulations= $simulations;
        array_unshift($this->queue, "added zero index ");
        unset($this->queue[0]); //zero index removed
        $this->shuffledBoxes = range(1,$amount);
        shuffle($this->shuffledBoxes);
        array_unshift($this->shuffledBoxes, "added zero index");
        unset($this->shuffledBoxes[0]); // zero index removed

    }

    public function CheckMyBoxes($id)
    {    
        $toCheck=null;
        $success=null;

        for ($i=1;$i<=$this->allowed_attemps_for_prisoner; $i++) //ammount of attempts
        {   
            if ($toCheck==null)
            {
                $toCheck=$id;
            }
            if ($this->describe==1) {echo "wiezien $id w pudelku $toCheck znalazl ".$this->shuffledBoxes[$toCheck].'<br>';}
            $toCheck=$this->shuffledBoxes[$toCheck];


            if ($this->shuffledBoxes[$toCheck]==$id)
            {
                $success=1;
                if ($this->describe==1) {echo 'więzień '.$id.' w pudełku '. $toCheck. ' znalazł '.$this->shuffledBoxes[$toCheck].". To była jego $i próba <hr>";}
                return 1;
                break;
            }
            if ($i==$this->allowed_attemps_for_prisoner && $success==false)
                {
                if ($this->describe==1) {echo  "nie udało sie, więzień $id ginie po $i probach <hr>";}
                return 0;
                break;
                }
                if ($i==$this->allowed_attemps_for_prisoner && $success==true && $id==$this->amount_of_prisoners)
                {
                if ($this->describe==1) {echo '<h1>brawo, wygrywasz</h1>';}
                return 1;
                break;
            }
                
        }
    }

    public function CheckPopulation()
    {
        foreach ($this->queue as $checker)
        {
            if ($this->CheckMyBoxes($checker)!==1) 
            {
            if ($this->describe2==1 ||$this->describe3==1){echo "<h5>prisoner $checker  has failed- all population has failed</h5>";}
            return 0;
            break;
            } 
                        
            if ($this->CheckMyBoxes($checker)==1) 
            {
                if ($this->describe2==1){echo "<h5>$checker succeed</h5>";}   
            }
            if ($this->CheckMyBoxes($checker)==1 && $checker==100) 
            {
                if ($this->describe3==1){echo "<h3>Population has succeed</h3>";}
                return 1;
            }    
        }
    }
    public function repeatTheTest()
    {
        $counter=0;
        for ($i=1;$i<=$this->amount_of_simulations;$i++)
        {
            if ($this->describe4==1) {
            echo "<h1>simulation $i</h1>";
            Var_dump($this->shuffledBoxes);

            }
        $result=$this->CheckPopulation();
        if ($result==1){$counter=$counter+1;}
            
            
        shuffle($this->shuffledBoxes);//randomizes the boxes order
        array_unshift($this->shuffledBoxes, "added zero index");
        unset($this->shuffledBoxes[0]); 
        }
        $part=$counter/$this->amount_of_simulations;
        echo"<h1>po wykonaniu $this->amount_of_simulations testów, powodzeniem zakończyło się $counter z nich. <br>Procent testów zakończonych powodzeniem:$part</h1>";

    }
};


$simulation = new BoxRoom(100, 1000); //arg - number of prisoners, number of simulations.


$result = $simulation->repeatTheTest();






