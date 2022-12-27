<?php
class BoxRoom{
    public $amount_of_prisoners;
    public $amount_of_boxes;
    public $shuffledBoxes = array();
    public $queue = array();

    function __construct($amount)
    {
        $this->amount_of_boxes=$amount;
        $this->amount_of_prisoners=$amount;
        $this->queue= range(1,$amount);
        $this->shuffledBoxes = range(1,$amount);
        shuffle($this->shuffledBoxes);

    }

    public function initialCheck() {
        $toCheck= $this->shuffledBoxes[0];
        echo 'pierwszy wiezien wylosowal '.$toCheck. ' w pierwszym pudle. Podszedł wiec do pudla z  numerem'.$toCheck . 'gdzie wylosowal liczbę'.
        $this->shuffledBoxes[$toCheck];

    }

};
$simulation = new BoxRoom(100);
$simulation->initialCheck();
?>
