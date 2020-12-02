<?php
namespace console\controllers;
use yii\console\Controller;
use yii;
use common\models\Catalog;

class MartanasyncController extends Controller {
   
    const IMPORT_DIRECTORY  =   'unico';
    const DEL_AFTER_SYNC    =   FALSE;
    const SYNC_PRICE        =   TRUE;
    const SYNC_QTY          =   TRUE;
    const FILE_TEMPLATE     =   '/^.+\.xml$/';
    
    
    public $xml;  /*данные из последнего файла XML */ 
    
    public function Init(){
       Yii::trace('=== Начало загрузки файла ===', 'UNICO');
       /* Получаем содержимое директории */
        if(count($files= scandir(Yii::getAlias('@frontend/runtime/'.self::IMPORT_DIRECTORY)))<3){
            Yii::trace('Отсутствуют файлы для синхронизации', 'UNICO');
            Yii::trace('=== Конец загрузки файла ===', 'UNICO');
           // echo 'No files';
            return false;
        }
        unset($files[0]);unset($files[1]);  
        foreach ($files as $file){
            if(preg_match(self::FILE_TEMPLATE ,$file)){
                $this->xml  = simplexml_load_file(Yii::getAlias('@frontend/runtime/'.self::IMPORT_DIRECTORY).'/'.$file);
                /*если файл старый - более суток - то удаляем его не обрабатывая */
                //if(time()-strtotime((string)$this->xml->creationDate)>24*60*60){                   
                //   unlink(Yii::getAlias('@frontend/runtime/'.self::IMPORT_DIRECTORY).'/'.$file);
                 //  Yii::trace('Файл '.$file.' не соответствует дате. Удален.', 'UNICO');
                 //  continue;
                //} 
                if (self::DEL_AFTER_SYNC){
                   unlink(Yii::getAlias('@frontend/runtime/'.self::IMPORT_DIRECTORY).'/'.$file); 
                }
                Yii::trace('Загружен файл '.$file, 'UNICO');
                Yii::trace('=== Конец загрузки файла ===', 'UNICO');
                return true;
            }
            else{
               unlink(Yii::getAlias('@frontend/runtime/'.self::IMPORT_DIRECTORY).'/'.$file); 
               Yii::trace('Файл '.$file.' не соответствует шаблону. Удален.', 'UNICO');
            }
        }
        return false;
    }
    
    public function actionSync(){
      // $products=Product::find()->where(['sku'=>'4009283000116'])->all();
      // var_dump($products);exit();
          if($this->xml){
          $updatedProducts=0;
          Yii::trace('=== Начало синхронизациии ===', 'UNICO');
          foreach ($this->xml->prices->priceItems as $item){
              
              // if((string)$item->barCode==''){continue;}/*если пустой артикул - пропускаем */
               $catalog=new Catalog();
               $catalog->torg_name=(string)$item->itemName;
               $catalog->manufacture=(string)$item->country.' '.(string)$item->manufName;
               $catalog->price=(string)$item->price;
               $catalog->apteka_id=1;
               $catalog->save();
          }  
          
         
          Yii::trace('=== Конец синхронизациии ===', 'UNICO');          
          exit();
          }
       Yii::trace('=== Нет XML данных для синхронизации ===', 'UNICO');
      
       Yii::trace('=== Конец синхронизациии ===', 'UNICO');
       exit();
    }

}
