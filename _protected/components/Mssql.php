<?php


namespace app\components;

use Yii;

class Mssql
{
    public $sqlsrv;

    public function __construct()
    {
        $this->mssql = Yii::createObject([
            'class' => 'yii\db\Connection',
            'driverName' => 'sqlsrv',
            'dsn' => 'sqlsrv:Server=10.142.137.15;Database=PDB',
            'username' => 'sa',
            'password' => 'C$@adm',
            'charset' => 'utf8'
        ]);
    }

    public function selectSash($pono)
    {
        $pono = ($pono)?"and Base.PONO = '".$pono."'": "";
        $select = "SELECT BaseEvents.Id
              ,BaseEvents.EventDT
              ,BaseEvents.EventName
              ,BaseEvents.UserId
            ,Base.ModelCode
            ,Base.ModelYear
            ,Base.VIN
            ,Base.PONO
            ,Base.PrimaryColorCode
          FROM [PDB].[dbo].[BaseEvents] as BaseEvents
          inner join [PDB].[dbo].[Base] as Base on Base.Id = BaseEvents.BaseId
          where BaseEvents.EventName = '3BB' $pono";

        return $this->mssql->createCommand($select)->queryAll();
    }
}
