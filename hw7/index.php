<?php
/**
 * Created by PhpStorm.
 * User: njbartel
 * Date: 11/8/2018
 * Time: 5:40 PM
 */
    require 'human.php';
    $human1 = new human('Nick');
    $human1-> stateName();
    $human2 = new human('Chad');
    $human2-> stateName();
    $human3 = new human('Name');
    $human3-> stateName();
    $human4 = new human('Somebody');
    $human4-> stateName();
    $human5 = new human('ToLuv');
    $human5 -> stateName();

    $human1->setMoney(5);
    $human2->work(3);
    $human3->setEnergy(8);
    $human4->setSleep(9);
    $human5->setMoney(10);

    echo $human1->getMoney() . "<br>";
    $human1->give1Money($human2);
    echo $human1->getMoney() . "<br>";

    ?>