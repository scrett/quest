<?php
//Котроллер прохождения квеста
require "config/bootstrap.php";

class Controller
{

   static public function index(){
       //получаем глобальные переменные для работы с Doctrine и Twig
       $entityManager=$GLOBALS['entityManager'];
       $twig=$GLOBALS['twig'];
       $startId=1;

       //проверить нет ли сохраненной истории прохождения
       session_start();
       if (!isset($_SESSION['gamer'])) {
           $gamer = new Player();
           $gamer->startQuest($startId);
       }
       else {
           $gamer=$_SESSION['gamer'];
       }

       //проверяем наличие команды от предидущей формы
       if(isset($_POST['actquest']))
           switch ($_POST['actquest']) {
               case 'revers':  //была нажата кнопка назад
                   $gamer->backQuest();
                   break;
               case 'start': //была нажата кнопка начать сначала
                   $gamer->startQuest($startId);
                   break;
               default: // была нажата кнопка следующего квеста
                   $way = $entityManager->getRepository(Way::class)->findOneBy(['id'=>$_POST['actquest']]);
                   if($way->getActId()==$gamer->getQuest()) { //дополнительно проверить возможен ли ход с єтого места
                       if (rand(0, 100) < $way->getTrap()) //проверяем вероятность попадания в ловушку
                           $gamer->addQuest($way->getTrapId()); //если попали в ловушку переходим на квест с ловушкой
                       else
                           $gamer->addQuest($way->getNextId()); //если не попали в ловушку переходим на следующий квест
                   }
           }
        //читаем из базы необходимые данные по следующему квесту
       $quest = $entityManager->getRepository(Quest::class)->findOneBy(['id'=>$gamer->getQuest()]);
       $ways = $entityManager->getRepository(Way::class)->findBy(['actId'=>$gamer->getQuest()]);

       $_SESSION['gamer']=$gamer; //сохраняем результат игры

       //выводим шаблон
       echo $twig->render('index.html.twig', array(
           'id'=> $gamer->getQuest(),
           'title' => $quest->getTitle(),
           'description' => $quest->getDescription(),
           'ways' => $ways,
           'history' => $gamer->getAllHistory()));

   }
}