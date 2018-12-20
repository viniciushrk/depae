<?php
/**
 * Created by PhpStorm.
 * User: k4io_
 * Date: 04/10/2018
 * Time: 15:29
 */

class Conexao
{

    private $user = 'root';
    private $senha = '';
    private $db = 'depae';
    private $host = 'localhost:3306';
    private $port = "3306";

    /**
     * @return PDO|string
     */



    public function conecta()
    {
        try {
            $con = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db", $this->user, $this->senha/*, array(PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_CASE => PDO::CASE_LOWER, PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)*/);
            $con->query("SET NAMES utf8");
            return $con;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return $e->getMessage();

        }
    }
}


