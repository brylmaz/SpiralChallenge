<?php 
namespace App\controllers;

use App\Controller;
use App\services\spiralService;
use App\model\Spiral;

class SpiralController extends Controller {
	
  function __construct() {

  }
  

  public function getLayout(){

    $post = json_decode(file_get_contents('php://input'), true);

    if (!isset($post['X']) || !isset($post['Y'])) {
      response(array(
        "result" => false,
        "message" => "Lütfen X ve Y parametlerini eksiksiz gönderiniz."
      ));
    }
    elseif($post['X'] < 1 || $post['Y'] < 1){
      response(array(
        "result" => false,
        "message" => "Lütfen 1'den küçük değer girmeyiniz."
      ));
    }
    elseif(!is_numeric($post['X']) || !is_numeric($post['Y'])){
      response(array(
        "result" => false,
        "message" => "Lütfen sadece rakam giriniz."
      ));
    }
    else{
      $X = htmlspecialchars(round($post['X']));
      $Y = htmlspecialchars(round($post['Y']));

      $spiralService = new spiralService();
      $resultArray = $spiralService->createSpiral($X, $Y);
      $spiralService->print2DGrid ($resultArray);

      $spiralObj = new Spiral();
      $spiralObj->x = $X;
      $spiralObj->y = $Y;
      $spiralObj->result = json_encode($resultArray);
      $spiralResult = $spiralObj->addSpiral();

      response(array(
        "result" => true,
        "LastInsertId" => $spiralResult
        
      ));
      
      
      
    }



  }

  public function getValueOfLayout(){

    $post = json_decode(file_get_contents('php://input'), true);

    if (!isset($post['X']) || !isset($post['Y']) || !isset($post['LastInsertId'])) {
      response(array(
        "result" => false,
        "message" => "Lütfen X,Y ve LastInsertId parametlerini eksiksiz gönderiniz."
      ));
    }
    elseif($post['X'] < 0 || $post['Y'] < 0 || $post['LastInsertId'] < 1){
      response(array(
        "result" => false,
        "message" => "Lütfen 1'den küçük değer girmeyiniz."
      ));
    }
    elseif(!is_numeric($post['X']) || !is_numeric($post['Y']) || !is_numeric($post['LastInsertId'])){
      response(array(
        "result" => false,
        "message" => "Lütfen sadece rakam giriniz."
      ));
    }
    else{
      $X = htmlspecialchars(round($post['X']));
      $Y = htmlspecialchars(round($post['Y']));
      $lastInsertId = htmlspecialchars($post['LastInsertId']);

      $spiralObj = new Spiral();
      $spiralObj->id=$lastInsertId;
      $spiralResult = $spiralObj->getSpiral();

      if ($spiralResult===false) {
        response(array(
          "result" => false,
          "message" => "Girilen Id ile eşleşen kayıt bulunamadı."

        ));
      }
      else{


        try {
          $spiralArr = json_decode($spiralResult['result'],true);
          foreach ($spiralArr as $key => $value) {
            if ($key==$Y) {
              $result = $value[$X];
            }
          }
          if ($result!=null) {
            response(array(
              "result" => true,
              "value" => $result

            ));
          }
          else{
            response(array(
              "result" => true,
              "message" => "Lütfen X: ".$spiralResult['x']." ve Y: ".$spiralResult['y']." degerinden büyük girmeyiniz."

            ));
          }
          
        } catch (Exception $e) {
          response(array(
            "result" => true,
            "message" => "Lütfen X: ".$spiralResult['x']." ve Y: ".$spiralResult['y']." degerinden büyük girmeyiniz."

          ));
        }
        

      }


      
      
      
    }


  }


}


?>