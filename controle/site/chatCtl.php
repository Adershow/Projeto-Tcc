<?php
require_once 'vendor/autoload.php';
class chatCtl extends controller
{
    public function index()
    {
        session_start();
        if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {

            echo "ERRO";
            header("location: logar");
        } else {
            $logado = $_SESSION['login'];
            $this->loadView('chat');
        }
        if (isset($_SESSION['roomIntern'])) {
           $_SESSION['roomIntern'] = '';
        }
    }

    public function criarSala()
    {
        session_start();
        $nomeSala = $_POST['nome'];
        $userId = $_POST['userId'];
        $creatorID = 'Pr.' . $_SESSION['id'];

        $chatkit = new Chatkit\Chatkit([
            'instance_locator' => 'v1:us1:af3aa747-66bc-4b25-93d7-bbb125df0f20',
            'key' => 'd28b4e1f-0e5e-4c0b-8c1c-dab59e586991:OHHgQIVrt7Ies4Um/q4IE4RasZgyoCxFLNrXl9NAQjA=',
        ]);

        $chatkit->createRoom([
            'creator_id' => $creatorID,
            'name' => $nomeSala,
            'user_ids' => [$userId],
            'private' => true,
        ]);

        header('location: ../chat');
        exit;
    }

    public function abreChat()
    {
        session_start();
        $chatkit = new Chatkit\Chatkit([
            'instance_locator' => 'v1:us1:af3aa747-66bc-4b25-93d7-bbb125df0f20',
            'key' => 'd28b4e1f-0e5e-4c0b-8c1c-dab59e586991:OHHgQIVrt7Ies4Um/q4IE4RasZgyoCxFLNrXl9NAQjA=',
        ]);

        $id = $_POST['id'];
        $_SESSION['roomIntern'] = $chatkit->getRoom([ 'id' => $id ])['body'];

        header('location: ../chat');
        exit;
    }
}
