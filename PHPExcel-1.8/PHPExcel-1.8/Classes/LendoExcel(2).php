<?php
/**
 * Created by PhpStorm.
 * User: lmart
 * Date: 07/11/2018
 * Time: 08:59
 */

class LendoExcel
{

    /**
     * Created by PhpStorm.
     * User: lmart
     * Date: 27/10/2018
     * Time: 19:15
     */

    public function salvar()
    {
        try {
            $con = $this->conecta();
            $sql = $con->prepare('insert into faltas (data_inicio, aluno_idAluno, motivo_idMotivo) values (?, ?, ?)');
            $sql->bindValue(1, $this->data_inicio);
            $sql->bindValue(2, $this->aluno_idAluno);
            $sql->bindValue(3, $this->motivo_idMotivo);
            $sql->execute();
            $this->idFaltas = $con->lastInsertId();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

    /*public function InserirTurma()
    {
        try {
            require_once "PHPExcel.php";

            $objreader = new PHPExcel_Reader_Excel5();
            $objreader->setReadDataOnly(true);
            $objPHPExcel = $objreader->load("Teste.xls");

            $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
            $total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);

            $total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

            for ($linha = 0; $linha <= $total_linhas; $linha++) {
                if (preg_match("/\ Nome:\ (.*?)/", utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue())) == 1) {
                    echo "<table border='2'>";
                    echo "<th>" . utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue());
                    echo "</th>";
                    echo "<br>";
                }
            }
        } catch (PDOException $e) {
            echo "erro";
        }
        echo "</tr>";
        echo "</table>";
    }

    public function InserirDisciplina()
    {
        try {
            require_once "PHPExcel.php";

            $objreader = new PHPExcel_Reader_Excel5();
            $objreader->setReadDataOnly(true);
            $objPHPExcel = $objreader->load("Teste.xls");

            $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
            $total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);

            $total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

            for ($linha = 0; $linha <= $total_linhas; $linha++) {
                if (preg_match("/\ Nome:\ (.*?)/", utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue())) == 1) {
                    echo "<table border='2'>";
                    echo "<th>" . utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue());
                    echo "</th>";
                    echo "<br>";
                }
            }
        }catch(PDOException $e) {
                echo "erro";
            }
    }

    public function InserirAluno()
    {
        try {
            require_once "PHPExcel.php";

            $objreader = new PHPExcel_Reader_Excel5();
            $objreader->setReadDataOnly(true);
            $objPHPExcel = $objreader->load("Teste.xls");

            $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
            $total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);

            $total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

//echo"".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,16)->getValue());

            for ($linha = 0; $linha<=$total_linhas; $linha++) {
                if (preg_match("/\ Nome:\ (.*?)/", utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue())) == 1) {
                    echo "<table border='2'>";
                    echo "<th>". utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue());
                    echo "</th>";
                    echo "<br>";
                }
                if (preg_match("/\ D.\ Nascimento:\ (.*?)/", utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue())) == 1) {
                    echo"<table border='2'>";
                    echo "<th>". utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue()) ;
                    echo "</th>";
                }
                if (preg_match("/\ RG:\ (.*?)/", utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $linha)->getValue())) == 1) {
                    echo "<table border='2'>";
                    echo "<th>". utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $linha)->getValue());
                    echo "</th>";
                }
                if (preg_match("/\ CPF:\ (.*?)/", utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(27, $linha)->getValue())) == 1) {
                    echo "<table border='2'>";
                    echo "<th>". utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(27, $linha)->getValue());
                    echo "</th>";
                }
                if (preg_match("/\ Curso:\ (.*?)/", utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue())) == 1) {
                    echo "<table border='2'>";
                    echo "<th>". utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue());
                    echo "</th>";
                }
                if (preg_match("/\ Matrícula:\ (.*?)/", utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(27, $linha)->getValue())) == 1) {
                    echo "<table border='2'>";
                    echo "<th>" . utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(27, $linha)->getValue());
                    echo "</th>";
                }
                echo"</table>";
            }
        } catch (PDOException $e) {
            echo "erro";
        }
    }
}*/