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

    /**
     * @return PDO|string
     */
    public function conecta()
    {
        try {
            $con = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->senha);
            $con->query("SET NAMES utf8");
            return $con;
        } catch (PDOException $e) {
            try{
                $con = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, "LuizGamer_13");
                $con->query("SET NAMES utf8");
                return $con;
            }catch(PDOException $e) {
                return $e->getMessage();
            }

        }
    }
}