<?php

namespace MVC\Core;

use MVC\Config\Database;
use MVC\Core\ResourceInterface;
use PDO;

class ResourceModel implements ResourceInterface
{
    protected $table;
    protected $id;
    protected $model;

    public function _init($table, $id, $model)
    {
        return $this->table = $table;
        return $this->id = $id;
        return $this->model = $model;

    }
     
    public function save($model)
    {
        $arrModel= $model->getProperties();

        $placeholder=[];
        $insert_key=[];
        $placeUpdate=[];
        if ($model->getId()===null){
            //insert
            foreach ($arrModel as $key=>$value){
                $insert_key[] =$key;
                array_push($placeholder, ':'.$key);

            }
            $strKeyIns= implode(', ',$insert_key);
            $strPlaceholder=implode(', ',$placeholder);
            $sql_insert="INSERT INTO $this->table ({$strKeyIns}) VALUES ({$strPlaceholder})";
            $obj_insert =Database::getBdd()->prepare($sql_insert);
            return $obj_insert->execute($arrModel);
        }else{
            foreach ($arrModel as $k=>$item){
                array_push($placeUpdate, $k.' = :'.$k);
            }

            //update
            $strPlaceUpdate=implode(', ',$placeUpdate);
            $sql_update="UPDATE {$this->table} SET $strPlaceUpdate WHERE id=:id";
            $obj_update=Database::getBdd()->prepare($sql_update);
            return $obj_update->execute($arrModel);
        }

    }

    public function delete($model)
    {
        $sql = "DELETE FROM $this->table WHERE id = ".$model;
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();

    }

    public function show()
    {

        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM $this->table WhERE id = ".$id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

}