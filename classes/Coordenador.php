<?php
/**
 * Created by PhpStorm.
 * User: viniciushrk
 * Date: 05/10/2018
 * Time: 15:53
 */

class Coordenador extends Conexao
{
    private $idCoordenador;
    private $servidor_idServidor;
    private $curso_idCurso;

    /**
     * @return mixed
     */
    public function seleciona($idCoordenador)
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from coordenador where idCoordenador = ?");
            $resul->bindValue(1, $idCoordenador);
            $resul->execute();
            $con = null;
            if ($resul->rowCount() > 0) {
                $resul = $resul->fetch();
                $this->idcoordenador = $resul[0];
                $this->servidor_idServidor = $resul[1];
                $this->curso_idCurso= $resul[2];
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    

    public function salvar()
    {
        try {
            $con = $this->conecta();
            $sql = $con->prepare('insert into coordenador(servidor_idServidor, curso_idCurso) values (?, ?)');
            $sql->bindValue(1, $this->getServidorIdServidor(), $this->getCursoIdCurso());
            $sql->execute();
            $this->id = $con->lastInsertId();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getIdcoordenador()
    {
        return $this->idcoordenador;
    }

    /**
     * @return mixed
     */
    public function getServidorIdServidor()
    {
        return $this->servidor_idServidor;
    }

    /**
     * @return mixed
     */
    public function getCursoIdCurso()
    {
        return $this->curso_idCurso;
    }

    
}