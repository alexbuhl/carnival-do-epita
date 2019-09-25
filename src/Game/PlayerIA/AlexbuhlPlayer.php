<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class PaperPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class AlexbuhlPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        if($this->result->getNbRound() > 0){
            if($this->result->getNbRound() > 10 && $this->result->getNbRound() % 3 == 0) {
                if ($this->result->getStatsFor($this->opponentSide)['scissors'] / $this->result->getNbRound() > 0.5) {
                    return parent::rockChoice();
                }
                if ($this->result->getStatsFor($this->opponentSide)['rock'] / $this->result->getNbRound() > 0.5) {
                    return parent::paperChoice();
                }
                if ($this->result->getStatsFor($this->opponentSide)['paper'] / $this->result->getNbRound() > 0.5) {
                    return parent::scissorsChoice();
                }
            }
            switch ($this->result->getLastChoiceFor($this->opponentSide)){
                case 'scissors':
                    if($this->result->getLastChoiceFor($this->mySide) == 'scissors'){
                        return parent::paperChoice();
                    }
                    return parent::rockChoice();
                case 'paper':
                    if($this->result->getLastChoiceFor($this->mySide) == 'paper'){
                        return parent::rockChoice();
                    }
                    return parent::scissorsChoice();
                case 'rock':
                    if($this->result->getLastChoiceFor($this->mySide) == 'rock'){
                        return parent::scissorsChoice();
                    }
                    return parent::paperChoice();
            }
        }
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
       // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
        
        return parent::rockChoice();
  }
};
