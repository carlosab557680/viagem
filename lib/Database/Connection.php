<?php

abstract class Connection //classe abstrata nao pode ser instanciada diretamente, somente via heran�a
{
    private static $Conn;
    private static $Conn1;
	private static $Conn2;
	private static $ConnTotvs;
	
    public static function getConn()//classe estatica nao precisa do $this->
    {
        if(self::$Conn == null){ //verifica se existe conexao aberta
			self::$Conn = new PDO('mysql:host=172.16.254.56; dbname=core_app;', 'facens', 'Facens@db#4040!');
            //self:: porque a classe e estatica, senao seria this->   
        }
        return self::$Conn; //mesmo que $this->$Conn 
    }
   
    public static function getConn1()//classe estatica nao precisa do $this->
    {
        if(self::$Conn1 == null){ //verifica se existe conexao aberta
			self::$Conn1 = new PDO('mysql:host=172.16.254.56; dbname=viagem;', 'facens', 'Facens@db#4040!');
        }
        return self::$Conn1;
    }
	
	public static function getConn2()//classe estatica - SQL Server
    {
        if(self::$Conn2 == null){ //verifica se existe conexao aberta
			self::$Conn2 = new PDO('sqlsrv:Server=172.16.254.12; Database=Procedimentos;', 'Procedimentos', 'pr0c3d1m3nt0s!@#');
        }
        return self::$Conn2;
    }
	
	public static function getConnTotvs()//classe estatica - SQL Server
    {
        if(self::$ConnTotvs == null){ //verifica se existe conexao aberta
			self::$ConnTotvs = new PDO('sqlsrv:Server=172.16.254.12; Database=LEC;', 'lec', 'l3c2016');
        }
        return self::$ConnTotvs; 
    }
	
	
	
}