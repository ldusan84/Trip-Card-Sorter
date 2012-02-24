<?php

/**
 * @description Card, class that represents travalling cards
 *
 * @author Dusan Lukic <ldusan84@gmail.com>
 */
class Card
{

	var $destination;
	var $transportation;
	var $start;

	/**
	 * Fill card data in constructor
	 *
	 * @param string $start
	 * @param string $destination
	 * @param string $transportation
	 * @param string $seat
	 * 
	 * @return void
	 */
	public function __construct($start, $destination, $transportation, $seat)
	{
		$this->start = $start;
		$this->transportation = $transportation;
		$this->destination = $destination;
		$this->seat = $seat;
	}

}

?>
