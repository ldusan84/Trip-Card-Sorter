<?php

/**
 * @description Trip category, creates trip according to trip cards
 *
 * @author Dusan Lukic <ldusan84@gmail.com>
 */
class Trip
{

    private $points;
    private $cards;
    private $begin;
    private $end;
    private $moment; // current place
    private $trip_end = true;

    /**
     * Sort cards.
     *
     * @param array $cards
     */
    private function sort($cards)
    {

        while (true) {

            foreach ($cards as $key => $val) {

                // if start of the card is where we are, add card to stack
                if ($val->start == $this->moment) {

                    // add to stack
                    $this->add($val);
                    // set new "moment" (current place) to destination of current card
                    $this->moment = $val->destination;
                    // remove this card
                    unset($cards[$key]);
                }
            }

            // check if we reached the end of the trip
            if ($this->end == $this->moment) {
                return;
            }
        }
    }

    /**
     * Determine global start and end and prepare starting moment.
     *
     * @param array $cards
     */
    private function prepare($cards)
    {

        foreach ($cards as $key => $val) {
            $destinations[] = $val->destination;
            $starts[] = $val->start;
        }

        foreach ($destinations as $key => $val) {
            if (!in_array($val, $starts)) {
                $this->end = $val;
            }
        }

        foreach ($starts as $key => $val) {
            if (!in_array($val, $destinations)) {
                $this->begin = $val;
            }
        }

        // set current place to beginning
        $this->moment = $this->begin;
    }

    /**
     * Add card to current points stack.
     *
     * @param Card $card
     */
    private function add(Card $card)
    {

        $this->points[] = $card;
    }

    /**
     * Output final string.
     *
     * @return string
     */
    private function output()
    {

        foreach ($this->points as $key => $val) {
            $stack[] = "Take " . $val->transportation . " from " . $val->start . " to " . $val->destination .
            	". The seat is: " . $val->seat;
        }
        $final = implode("\n", $stack);

        return $final;
    }

    /**
     * Initialize.
     *
     * @param array $cards
     *
     * @return string
     */
    public function init($cards)
    {

        $this->prepare($cards);
        $this->sort($cards);

        return $this->output();
    }

}
