<?php

abstract class Conn {

    // variáveis de conexão recebendo as constantes de configuração
    public static $host = HOST;
    public static $user = USER;
    public static $pass = PASS;
    public static $dbname = DBNAME;
    
    private static $Connect = null;
    
    //Conectando com o banco de dados utilizando o PDO
    private static function Conectar(){
        try{
            if (self::$Connect == null) {
                self::$Connect = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$pass);
            }
        } catch (Exception $e) {
            echo "Errdo:  {$e->getMessage()}";
            die;
        }
        // Informamos que o modo de informar erros (error_reporting) será por exceptions
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    protected static function getConn(){
        return self::Conectar();
    }
   
}
