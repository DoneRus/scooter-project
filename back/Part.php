<?php
include 'General.php';

class Part {
    private int $id;
    private string $part;
    private string $purchase_price;
    private string $sell_price;

    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->part = $part;
        $this->purchase_price = $purchase_price;
        $this->sell_price = $sell_price;
    }

    public function getId(): int { return $this->id; }
    public function getPart(): string { return $this->part; }
    public function getPurchase_price(): string { return $this->purchase_price; }
    public function getSell_price(): string { return $this->sell_price; }
}

?>