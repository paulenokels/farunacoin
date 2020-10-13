<?php

class MinerCronjob {
    private $host = 'localhost';
    private $username = 'paulenokels';
    private $password = 'achethegreat';
    private $db_name = 'faruna_coin';
    private $mysqli = null;
    public  $systemAddress = "9FHIWNESTXKY7ZMA4STQSADZM6IQDHFHKEJYH2LUZT";

    private $minerCoins = 0.3;

    public function __construct() {
        echo "initialzing miner cron job...";
        $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        $miners = $this->getMiners();
        if (count($miners)) {
            foreach ($miners as $miner) {
                echo $miner->fac_wallet_address."\n";
                $this->creditMiner($miner);
             
            }
        }

    }

    private function getMiners() {
        $miners = [];
        $query = $this->mysqli->query("SELECT user_id FROM `miners`");
        if (mysqli_num_rows($query) == 0) {
            while ($miner = mysqli_fetch_object($query)) {
                $miner = mysqli_fetch_object($this->mysqli->query("SELECT fac_wallet_address, coin_balance, id FROM users WHERE `id`='$miner->user_id'"));
                array_push($miners, $miner);
             }
        }
        

        return $miners;
    }

    private function creditMiner($miner) {
        $coinBalance = $miner->coin_balance + $this->minerCoins;
        echo "New balance - $coinBalance \n";
        $this->mysqli->query("UPDATE users SET coin_balance='$coinBalance' WHERE id ='$miner->id'");
        $reference = rand(1, 1000000);
        $this->mysqli->query("INSERT INTO `ledger` (`sender_address`, `receiver_address`, `fac_amount`, `channel`, `reference`, `created_at`)
         VALUES ('$this->systemAddress', '$miner->fac_wallet_address', '$this->minerCoins', 'MINING', '$reference', now()) ") or die(mysqli_error($this->mysqli));
    }
}

new MinerCronjob();