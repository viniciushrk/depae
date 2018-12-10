<?php
/**
 * Created by PhpStorm.
 * User: viniciushrk
 * Date: 05/10/2018
 * Time: 15:14
 */

class Turma extends Conexao
{
    private $idTurma;
    private $serie;
    private $periodo_letivo;
    private $curso_idCurso;
    private $turno_idturno;


    public function selecionaPorIdTurma($idTurma)
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from turma where idTurma = ?");
            $resul->bindValue(1, $idTurma);
            $resul->execute();
            $con = null;
            if ($resul->rowCount() > 0) {
                $resul = $resul->fetch();
                $this->idTurma = $resul[0];
                $this->serie = $resul[1];
                $this->periodo_letivo= $resul[2];
                $this->curso_idCurso= $resul[3];
                $this->turno_idturno= $resul[4];

                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function listaTurma()
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from turma");
            $resul->execute();
            $con = null;
            return $resul->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param mixed $idTurma
     */
    public function setIdTurma($idTurma)
    {
        $this->idTurma = $idTurma;
    }

    /**
     * @param mixed $curso_idCurso
     */
    public function setCursoIdCurso($curso_idCurso)
    {
        $this->curso_idCurso = $curso_idCurso;
    }

    /**
     * @param mixed $turno_idturno
     */
    public function setTurnoIdturno($turno_idturno)
    {
        $this->turno_idturno = $turno_idturno;
    }
    public function selecionaTurmasPorPeriodoLetivo($periodo_letivo)
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from turma where periodo_letivo = ?");
            $resul->bindValue(1, $periodo_letivo);
            $resul->execute();
            $con = null;
            if ($resul->rowCount() > 0) {
                return $resul->fetchall();
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function selecionaTurmasPorIdCurso($idCurso)
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from turma where Curso_idCurso = ?");
            $resul->bindValue(1, $idCurso);
            $resul->execute();
            $con = null;
            if ($resul->rowCount() > 0) {
                return $resul->fetchall();
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function selecionaTurmasPorIdCursoETurno($idCurso, $idTurno)
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from turma where Curso_idCurso = ? and turno_idTurno = ?");
            $resul->bindValue(1, $idCurso);
            $resul->bindValue(2, $idTurno);
            $resul->execute();
            $con = null;
            if ($resul->rowCount() > 0) {
                return $resul->fetchall();
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function selecionaTurmasPorIdTurno($idTurno)
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from turma where turno_idTurno = ?");
            $resul->bindValue(1, $idTurno);
            $resul->execute();
            $con = null;
            if ($resul->rowCount() > 0) {
                return $resul->fetchall();
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function selecionaTurmasPorSerie($serie)
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from turma where serie = ?");
            $resul->bindValue(1, $serie);
            $resul->execute();
            $con = null;
            if ($resul->rowCount() > 0) {
                return $resul->fetchall();
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function selecionaTodasTurma()
    {
        try {
            $con = $this->conecta();
            $resul = $con->prepare("select * from turma");
            $resul->execute();
            $con = null;
            if ($resul->rowCount() > 0) {
                return $resul->fetchall();
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
            $sql = $con->prepare("insert into turma(idTurma, serie, periodo_letivo, curso_idCurso, turno_idturno) values (?, ?, ?, ?, ?)");
            $sql->bindValue(1, $this->idTurma);
            $sql->bindValue(2, $this->serie);
            $sql->bindValue(3, $this->periodo_letivo);
            $sql->bindValue(4, $this->curso_idCurso);
            $sql->bindValue(5, $this->turno_idturno);
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function atualizar()
    {
        try {
            $con = $this->conecta();
            $sql = $con->prepare("update into turma set serie = ?, periodo_letivo = ?, curso_idCurso = ?, turno_idturno = ? where idTurma = ?");
            $sql->bindValue(1, $this->serie);
            $sql->bindValue(2, $this->periodo_letivo);
            $sql->bindValue(3, $this->curso_idCurso);
            $sql->bindValue(4, $this->turno_idturno);
            $sql->bindValue(5, $this->idTurma);

            $sql->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function getIdTurma()
    {
        return $this->idTurma;
    }



    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getPeriodoLetivo()
    {
        return $this->periodo_letivo;
    }

    /**
     * @param mixed $periodo_letivo
     */
    public function setPeriodoLetivo($periodo_letivo)
    {
        $this->periodo_letivo = $periodo_letivo;
    }

    /**
     * @return mixed
     */
    public function getCursoIdCurso()
    {
        return $this->curso_idCurso;
    }

    /**
     * @return mixed
     */
    public function getTurnoIdturno()
    {
        return $this->turno_idturno;
    }


}