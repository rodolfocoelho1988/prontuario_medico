<?php

namespace App\Models\MedicalRecords;

use App\Models\Model;
use Klein\Request;

class Anamnese extends Model
{
    /**
     * Anamnese constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $agendamento
     * @return mixed
     */
    public function byAgendamento(int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("SELECT * FROM ficha_anamnese WHERE agendamento_id = :agendamento");
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->fetch();
    }

    /**
     * @param array $anamnese
     * @param int $agendamento
     * @return int
     */
    public function update(array $anamnese, int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("UPDATE ficha_anamnese SET queixa_principal = :queixa_principal, historico = :historico, problemas_renais = :problemas_renais, problemas_articulares = :problemas_articulares, problemas_cardiacos = :problemas_cardiacos, problemas_respiratorios = :problemas_respiratorios, problemas_gastricos = :problemas_gastricos, alergias = :alergias, hepatite = :hepatite, gravidez = :gravidez, diabetes = :diabetes, problemas_de_cicatrizacao = :problemas_de_cicatrizacao WHERE agendamento_id = :agendamento");
        $db->bindParam(":queixa_principal", $anamnese['queixa_principal']);
        $db->bindParam(":historico", $anamnese['historico']);
        $db->bindParam(":problemas_renais", $anamnese['problemas_renais']);
        $db->bindParam(":problemas_articulares", $anamnese['problemas_articulares']);
        $db->bindParam(":problemas_cardiacos", $anamnese['problemas_cardiacos']);
        $db->bindParam(":problemas_respiratorios", $anamnese['problemas_respiratorios']);
        $db->bindParam(":problemas_gastricos", $anamnese['problemas_gastricos']);
        $db->bindParam(":alergias", $anamnese['alergias']);
        $db->bindParam(":hepatite", $anamnese['hepatite']);
        $db->bindParam(":gravidez", $anamnese['gravidez']);
        $db->bindParam(":diabetes", $anamnese['diabetes']);
        $db->bindParam(":problemas_de_cicatrizacao", $anamnese['problemas_de_cicatrizacao']);
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->rowCount();
    }

    /**
     * @param array $anamnese
     * @param int $agendamento
     * @return string
     */
    public function create(array $anamnese, int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO ficha_anamnese (queixa_principal, historico, problemas_renais, problemas_articulares, problemas_cardiacos, problemas_respiratorios, problemas_gastricos, alergias, hepatite, gravidez, diabetes, problemas_de_cicatrizacao, agendamento_id) VALUES (:queixa_principal, :historico, :problemas_renais, :problemas_articulares, :problemas_cardiacos, :problemas_respiratorios, :problemas_gastricos, :alergias, :hepatite, :gravidez, :diabetes, :problemas_de_cicatrizacao, :agendamento)");
        $db->bindParam(":queixa_principal", $anamnese['queixa_principal']);
        $db->bindParam(":historico", $anamnese['historico']);
        $db->bindParam(":problemas_renais", $anamnese['problemas_renais']);
        $db->bindParam(":problemas_articulares", $anamnese['problemas_articulares']);
        $db->bindParam(":problemas_cardiacos", $anamnese['problemas_cardiacos']);
        $db->bindParam(":problemas_respiratorios", $anamnese['problemas_respiratorios']);
        $db->bindParam(":problemas_gastricos", $anamnese['problemas_gastricos']);
        $db->bindParam(":alergias", $anamnese['alergias']);
        $db->bindParam(":hepatite", $anamnese['hepatite']);
        $db->bindParam(":gravidez", $anamnese['gravidez']);
        $db->bindParam(":diabetes", $anamnese['diabetes']);
        $db->bindParam(":problemas_de_cicatrizacao", $anamnese['problemas_de_cicatrizacao']);
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $database->lastInsertId();
    }
}