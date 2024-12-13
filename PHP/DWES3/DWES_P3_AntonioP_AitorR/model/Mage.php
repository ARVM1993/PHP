<?php

include_once "./Character.php";

class Mage extends Character {
    private bool $dodge;
    private int $health;

    public function __construct(string $type, string $name, int $hp, float $damage, int $level, int $numBattle, bool $dodge, int $health) {
        parent::__construct($type, $name, $hp, $damage, $level, $numBattle);
        $this->dodge = $dodge;
        $this->health = $health;
    }

    public function getDodge() {
        return $this->dodge;
    }

    public function setDodge($dodge) {
        $this->dodge = $dodge;
        return $this;
    }

    public function getHealth() {
        return $this->health;
    }

    public function setHealth($health) {
        $this->health = $health;
        return $this;
    }

    public function __toString() {
        $dodgeStatus = $this->dodge ? "Yes" : "No";
        return parent::__toString() . "\nDodge: {$dodgeStatus}\nHealth: {$this->health}";
    }

    public function dodging() {
        $this->dodge = (bool)rand(0, 1);
        return $this->dodge ? "You dodged the attack" : "You didn't dodge the attack";
    }

    public function cure() {
        $healingAmount = $this->health * 0.5; // Heal 50% of max health
        $newHp = min($this->getHp() + $healingAmount, $this->health); // Cap HP to max health
        $this->setHp($newHp);
    }
}

