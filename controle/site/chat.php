<?php require_once 'vendor/autoload.php';

$chatkit = new Chatkit\Chatkit([
  'instance_locator' => 'v1:us1:af3aa747-66bc-4b25-93d7-bbb125df0f20',
  'key' => 'd28b4e1f-0e5e-4c0b-8c1c-dab59e586991:OHHgQIVrt7Ies4Um/q4IE4RasZgyoCxFLNrXl9NAQjA=',
]);
try {
  if ($_SESSION['tipo'] == 'professor') {
    $chatkit->getUser(['id' => 'Pr.' . $_SESSION['id']]);
  } else {
    $chatkit->getUser(['id' => $_SESSION['id']]);
  }

} catch (Exception $e) {
  if($_SESSION['tipo'] == 'professor'){
    $chatkit->createUser([
      'id' => 'Pr.'.$_SESSION['id'],
      'name' => $_SESSION['login'],
      'custom_data' => [
        'email' => $_SESSION['email'],
        'pasta' => $_SESSION['tipoUper'] . '_' . $_SESSION['cpf'],
        'imagem' => $_SESSION['imagem'],
      ],
    ]);
  }else{
    $chatkit->createUser([
      'id' => $_SESSION['id'],
      'name' => $_SESSION['login'],
      'custom_data' => [
        'email' => $_SESSION['email'],
        'pasta' => $_SESSION['tipoUper'] . '_' . $_SESSION['cpf'],
        'imagem' => $_SESSION['imagem'],
      ],
    ]);
  }

}
