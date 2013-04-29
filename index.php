<?php

require 'card.php';
require 'trip.php';

$first = new Card('Madrid', 'Barcelona', 'bus', 'a');
$second = new Card('Barcelona', 'Taragona', 'train', 'b');
$third = new Card('Newcastle', 'Berlin', 'boat', 'c');
$fourth = new Card('Taragona', 'Newcastle', 'bus', 'd');
$fifth = new Card('Berlin', 'London', 'train', 'e');

$cards = array($second, $first, $third, $fourth, $fifth);

$journey = new Trip();
echo $journey->init($cards);
