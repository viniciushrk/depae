<?php
/**
 * Created by PhpStorm.
 * User: lmart
 * Date: 12/12/2018
 * Time: 14:14
 */

require_once "classes/Servidor.php";
require_once "classes/Faltas.php";
require_once "classes/Nivel_falta.php";
require_once "classes/Aluno.php";
require_once "classes/Curso.php";
require_once "classes/Turno.php";
require_once "classes/Turma.php";
require_once "classes/Motivo.php";
session_start();

$servidor = new Servidor();
$Faltas = new Faltas();
$Nivel_falta = new Nivel_falta();
$Aluno = new Aluno();
$Curso = new Curso();
$Turno = new Turno();
$Turma = new Turma();
$Motivo = new Motivo();


$Aluno->selecionaAlunosPorNome('nome');
$Turma->selecionaPorIdTurma('idturma');
$Curso->selecionaPorIdCurso($Turma->getCursoIdCurso());
$Turno->seleciona($Turma->getTurnoIdTurno());
//$Nivel_falta->selecionaPorNivelFalta($_POST('nivel_falta'));
//$Motivo->selecionaMotivoPorNome_e_NivelFalta($_POST('nome'),$Nivel_falta->getNivelFalta());
//$Motivo->selecionaMotivoPorNome($_POST('nome'));
$Faltas->setAlunoNumMatricula($Aluno->getNumMatricula());
$Faltas->setMotivoIdMotivo($Motivo->getIdMotivo());
$Faltas->atualizar();
header("Location: index.php?page=pag6");

?>