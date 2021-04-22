<?php
    class Pessoa{
        private $pdo;
        public function __construct($dbname, $host, $user, $password) // primeiro codigo a ser chamad
        {
            try{
                $this->pdo = new PDO("mysql: dbname= " . $dbname . "; host: " . $host, $user, $password);
            }
            catch(PDOException $ex){
                echo "BANCO: " . $ex->getMessage();
                exit();
            }
            catch(Exception $ex){
                echo "Gereal: " . $ex->getMessage();
            }
        }

        public function buscarDados(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * from db_crud.tb_usuario order by cd_usuario desc");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function cadastrarPessoa($email, $nome, $telefone){
            //verificando cadastro;
            $cmd = $this->pdo->prepare("SELECT cd_usuario from tb_usuario where nm_email = :email");
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            if($cmd->rowCount()>0){
                return false;
            } else { //se não estiver cadastrado.....
                $cmd = $this->pdo->prepare("INSERT INTO db_crud.tb_usuario (nm_usuario, nm_email, cd_telefone) VALUES (:n, :e, :t)");
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":t", $telefone);
                $cmd->bindValue(":e", $email);
                $cmd->execute();
                return true;
            }
        } 


    }



?>