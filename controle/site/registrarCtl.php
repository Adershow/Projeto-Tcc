<?php
require '../ProjetoFlexbox/modelo/DAO/GenericDAO.php';
require '../ProjetoFlexbox/modelo/Usuario.php';
require '../ProjetoFlexbox/modelo/Professor.php';
require_once 'vendor/autoload.php';
class registrarCtl extends controller
{

    public function index()
    {

        session_start();
        $DAO = new GenericDAO();
        $DAO1 = new GenericDAO();

        $DAO->query("SELECT * FROM materias");
        $DAO1->query("SELECT e.uf, c.nome FROM estado e INNER JOIN cidade c on c.estado = e.id");
        $_SESSION['estado'] = $DAO1->result();
        $_SESSION['materias'] = $DAO->result();
        $this->loadView('registrarlogar');
    }

    public function verificaCpf($cpf)
    {

        if (($cpf != '11111111111') && ($cpf != '22222222222') && ($cpf != '33333333333') && ($cpf != '44444444444') && ($cpf != '55555555555') && ($cpf != '66666666666') && ($cpf != '77777777777') && ($cpf != '88888888888') && ($cpf != '99999999999')) {
            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{
                        $c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{
                    $c} != $d) {
                    return false;
                    exit;
                }
            }
            return true;
        } else {
            return false;
            exit;
        }
    }

    public function verificaEmail($tipo, $email)
    {
        $DAO = new GenericDAO();
        $usuario = new Usuario();

        $DAO->query("SELECT * FROM " . $tipo . " WHERE email = '" . $email . "'");

        if (sizeof($DAO->result()) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verifica($tipo, $cpf){
        $DAO = new GenericDAO();
        $usuario = new Usuario();

        $DAO->query("SELECT * FROM " . $tipo . " WHERE cpf = '" . $cpf . "'");

        if (sizeof($DAO->result()) == 0) {
            return true;
        } else {
            return false;
        }
    }


    public function usuarioRegistrar()
    {

        $chatkit = new Chatkit\Chatkit([
            'instance_locator' => 'v1:us1:af3aa747-66bc-4b25-93d7-bbb125df0f20',
            'key' => 'd28b4e1f-0e5e-4c0b-8c1c-dab59e586991:OHHgQIVrt7Ies4Um/q4IE4RasZgyoCxFLNrXl9NAQjA=',
        ]);

        $DAO = new GenericDAO();
        $usuario = new Usuario();

        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setCpf($_POST['cpf']);
        $usuario->setSenha($_POST['senha']);
        $confirmarSenha = $_POST['confirmarSenha'];
        $usuario->setImagem($_FILES['imagem']);
        $imagem = $usuario->getImagem();

        foreach ($_POST['estados'] as $uf) {
            $array = explode(',', $uf, 2);
            foreach ($array as $cidade) {
                if (strlen($cidade) == 2) {
                    $usuario->setUf($cidade);
                } else {
                    $usuario->setCidade($cidade);
                }
            }
        }

        if (($this->verificaEmail('usuario', $usuario->getEmail()) == true) && ($this->verifica('usuario', $usuario->getCpf()) == true)) {
            if ($this->verificaCpf($usuario->getCpf()) == true) {
                if ($usuario->getSenha() == $confirmarSenha) {
                    if (isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])) {
                        $extensao = substr($_FILES['imagem']['name'], -4);
                        mkdir('../ProjetoFlexbox/controle/arquivos/Usuario_' . $usuario->getCpf());
                        print_r(move_uploaded_file($imagem['tmp_name'], '../ProjetoFlexbox/controle/arquivos/Usuario_' . $usuario->getCpf() . '/' . md5($usuario->getCpf()) . $extensao));

                        $DAO->insert("usuario", array(
                            "nome" => $usuario->getNome(),
                            "email" => $usuario->getEmail(),
                            "cpf" => $usuario->getCpf(),
                            "adm" => '0',
                            "cidade" => $usuario->getCidade(),
                            "imagem" => md5($usuario->getCpf()) . $extensao,
                            "senha" => $usuario->getSenha(),
                            "uf" => $usuario->getUf(),
                            "imagem1" => null,
                        ));

                        $DAO->query('SELECT LAST_INSERT_ID()');
                        $last_id = $DAO->result();

                        foreach ($last_id as $dado) {
                            $chatkit->createUser([
                                'id' => (string) $dado['LAST_INSERT_ID()'],
                                'name' => $usuario->getNome(),
                                'custom_data' => [
                                    'email' => $usuario->getEmail(),
                                    'pasta' => 'Usuario_' . $usuario->getCpf(),
                                    'imagem' => md5($usuario->getCpf()) . $extensao,
                                ],
                            ]);
                        }

                        echo "<script language='javascript' type='text/javascript'>alert('Cadastrado com sucesso');window.location.href='../';</script>";
                        exit;
                    }
                } else {
                    echo "<script language='javascript' type='text/javascript'>alert('Dados não preenchidos ou senhas não identicas');window.location.href='../registrar';</script>";
                    exit;
                }
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Cpf Invalido');window.location.href='../registrar';</script>";
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Email ou Cpf já existente');window.location.href='../registrar';</script>";
        }

    }

    public function professorRegistrar()
    {

		$chatkit = new Chatkit\Chatkit([
            'instance_locator' => 'v1:us1:af3aa747-66bc-4b25-93d7-bbb125df0f20',
            'key' => 'd28b4e1f-0e5e-4c0b-8c1c-dab59e586991:OHHgQIVrt7Ies4Um/q4IE4RasZgyoCxFLNrXl9NAQjA=',
        ]);

        $DAO = new GenericDAO();
        $professor = new Professor();

        $professor->setNome($_POST['nome']);
        $professor->setEmail($_POST['email']);
        $professor->setCpf($_POST['cpf']);
        $professor->setEndereco($_POST['endereco']);
        $professor->setDescricao($_POST['descricao']);
        $professor->setSenha($_POST['senha']);
        $confirmarSenha = $_POST['confirmarSenha'];
        $professor->setImagem($_FILES['imagem']);
        $imagem = $professor->getImagem();

        foreach ($_POST['estados'] as $uf) {
            $array = explode(',', $uf, 2);
            foreach ($array as $cidade) {
                if (strlen($cidade) == 2) {
                    $professor->setUf($cidade);
                } else {
                    $professor->setCidade($cidade);
                }
            }
        }

        if ($this->verificaEmail('professor', $professor->getEmail()) == true || $this->verifica('professor', $professor->getCpf()) == true) {
            if ($this->verificaCpf($professor->getCpf()) == true) {
                if ($professor->getSenha() == $confirmarSenha) {
                    if (isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])) {
                        $extensao = substr($_FILES['imagem']['name'], -4);
                        mkdir('../ProjetoFlexbox/controle/arquivos/Professor_' . $professor->getCpf());
                        print_r(move_uploaded_file($imagem['tmp_name'], '../ProjetoFlexbox/controle/arquivos/Professor_' . $professor->getCpf() . '/' . md5($professor->getCpf()) . $extensao));

                        $DAO->insert("professor", array(
                            "nome" => $professor->getNome(),
                            "email" => $professor->getEmail(),
                            "cpf" => $professor->getCpf(),
                            "cidade" => $professor->getCidade(),
                            "endereco" => $professor->getEndereco(),
                            "descricao" => $professor->getDescricao(),
                            "imagem" => md5($professor->getCpf()) . $extensao,
                            "senha" => $professor->getSenha(),
                            "uf" => $professor->getUf(),
                        ));

                        $DAO->query('SELECT LAST_INSERT_ID()');
                        $last_id = $DAO->result();

                        foreach ($last_id as $dado) {

                            $chatkit->createUser([
                                'id' => 'Pr.' . (string) $dado['LAST_INSERT_ID()'],
                                'name' => $professor->getNome(),
                                'custom_data' => [
                                    'email' => $professor->getEmail(),
                                    'pasta' => 'Professor_' . $professor->getCpf(),
                                    'imagem' => md5($professor->getCpf()) . $extensao,
                                ],
                            ]);

                            foreach ($_POST['materias'] as $materias) {
                                print_r($materias);
                                $DAO->insert('professor_has_materias', array('materias_id' => $materias, 'professor_id' => $dado['LAST_INSERT_ID()']));

                            }
                        }

                        echo "<script language='javascript' type='text/javascript'>alert('Cadastrados com sucesso');window.location.href='../';</script>";
                        exit;

                    }
                } else {
                    echo "<script language='javascript' type='text/javascript'>alert('Dados não preenchidos ou senhas não identicas');window.location.href='../registrar';</script>";
                    exit;
                }
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Cpf Invalido');window.location.href='../registrar';</script>";
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Email ou Cpf já existente');window.location.href='../registrar';</script>";
        }
    }
}
