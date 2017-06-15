<?php
final class TipoDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarTipo()
    {
        $sql = "SELECT * FROM vw_listartipo";

        try {
            $f = $this->db->prepare($sql);
            $ret = $f->execute();

            $this->db = null;

            if (!$ret) {
                die ("Erro ao listar tipo.");
            } else {
                return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }
}
?>
