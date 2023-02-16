<?php
$kasutaja='d113362_vlademir'; //$kasutaja='d113362_vlademir'                          $kasutaja='guzov';
$server='d113362.mysql.zonevs.eu'; //$server='d113362.mysql.zonevs.eu'                $server='localhost';
$andmebaas='d113362_baas'; //$andmebaas='d113362_baas'                             $andmebaas='guzov';
$salasyna='zoneidpassword';//$salasyna='zoneidpassword'                        $salasyna='1234567890';
//teeme käsk mis ühendab andmebaasiga
$yhendus=new mysqli($server, $kasutaja, $salasyna, $andmebaas);
