<?php

require basePath("Models/BaseModel.php");

class CoursesModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("Curso");
    }

    /**
     * Add a new course
     *
     * @param string $nome
     * @param string $descricao
     * @param integer $carga_horaria
     * @param integer $qtd_aulas
     * @param integer $qtd_alunos_matriculados
     * @return void
     */
    public function add(string $nome, string $descricao, int $carga_horaria, int $qtd_aulas, int $qtd_alunos_matriculados)
    {
        $professorId = 1;

        $params = [
            "professor_id" => $professorId,
            "nome" => $nome,
            "descricao" => $descricao,
            "carga_horario" => $carga_horaria,
            "qtd_aulas" => $qtd_aulas,
            "qtd_alunos_matriculados" => $qtd_alunos_matriculados
        ];

        $query = "INSERT INTO {$this->table} (professor_id, nome, descricao, carga_horario, qtd_aulas, qtd_alunos_matriculados) VALUES (:professor_id, :nome, :descricao, :carga_horario, :qtd_aulas, :qtd_alunos_matriculados)";

        $smth = $this->connection->prepare($query);
        $smth->execute($params);
    }
}
