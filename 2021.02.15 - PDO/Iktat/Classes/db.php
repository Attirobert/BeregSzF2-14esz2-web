<?php
header("content-type:text/html; charset=utf-8");

class DbConnect
{
    // lokális változók
    protected $host;
    protected $user;
    protected $pwd;
    protected $con;

    // Konstruktor 
    function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pwd = "";
    }

    // Destruktor
    function __destruct()
    {
        // echo "<script>alert('Az adatbázis lezárva!')</script>";
    }

    // Kapcsolódás az adatbázishoz
    function Connection($dbname)
    {
        try {
            $this->con = new PDO("mysql:host=$this->host; dbname=$dbname", $this->user, $this->pwd);
            $this->con->exec("set names 'UTF8'");
        } catch (PDOException $e) {
            die("<h1> Kapcsolódási hiba</h1><p>$e</p>");
        }
    }

    // Felhasználói metódusok
    // User hozzáadása
    function userIns($pName, $pPwd, $pAdmin)
    {
        // Eredményesség jelzésére
        $success = false;
        // Az insert kifejezés összeállítása
        $res = $this->con->prepare("insert into users (Nev,Jelszo,Admin) values (?,?,?)");
        // Paraméterek beállítása
        $res->bindparam(1, $pName);
        $res->bindparam(2, $pPwd);
        $res->bindparam(3, $pAdmin);
        // SQL parancs futtatása
        $row = $res->execute();

        if ($row > 0) $success = true;

        return $success;
    }

    // User módosítása
    function userUpd($pId, $pName, $pPwd, $pAdmin)
    {
        // Eredményesség jelzésére
        $success = false;
        // Az update kifejezés összeállítása
        // 1. verzió paraméter beállítás nélkül
        // $res = $this->con->prepare("UPDATE `users` SET `Nev`=$pName,`Jelszo`=$pPwd,`Admin`=$pAdmin WHERE ID_user = $pId");
        // 2. verzió paraméteres SQL
        $res = $this->con->prepare("UPDATE `users` SET `Nev`= :pName,`Jelszo`= :pPwd,`Admin`= :pAdmin WHERE ID_user = :pId");

        // Paraméterek beállítása
        $res->bindparam('pName', $pName);
        $res->bindparam('pPwd', $pPwd);
        $res->bindparam('pAdmin', $pAdmin);
        $res->bindparam('pId', $pId);
        // SQL parancs futtatása
        $row = $res->execute();

        if ($row > 0) $success = true;

        return $success;
    }
    // User törlése
    function userDel($pId)
    {
        // Eredményesség jelzésére
        $success = false;
        // Az update kifejezés összeállítása
        $res = $this->con->prepare("delete from `users` WHERE ID_user = :pId");

        // Paraméterek beállítása
        $res->bindparam('pId', $pId);
        // SQL parancs futtatása
        $row = $res->execute();

        if ($row > 0) $success = true;

        return $success;
    }

    // Teljes lista lekérése
    function allList()
    {
        $tomb = null;
        $res = $this->con->prepare("select * from users");
        $row = $res->execute();

        while ($row = $res->fetch()) {
            $tomb[] = $row;
        }

        return $tomb;
    }

    // User ellenőrzése
    function LoginCheck($user, $pwd)
    {
        // Eredményesség jelzésére
        $success = false;
        // Az update kifejezés összeállítása
        $res = $this->con->prepare("select Nev, Jelszo from `users` where Nev = :pNev and Jelszo = :pPwd");

        // Paraméterek beállítása
        $res->bindparam('pNev', $user);
        $res->bindparam('pPwd', $pwd);
        // SQL parancs futtatása
        $row = $res->execute();
        $row = $res->fetch();

        if ($row > 0) $success = true;

        return $success;
    }

    function UserNameCheck($user)
    {
        // Eredményesség jelzésére
        $success = false;
        // Az update kifejezés összeállítása
        $res = $this->con->prepare("select Nev from `users` where Nev = :pNev");

        // Paraméterek beállítása
        $res->bindparam('pNev', $user);
        // SQL parancs futtatása
        $row = $res->execute();
        $row = $res->fetch();

        if ($row > 0) $success = true;

        return $success;
    }

    function selectUpload()
    {
        $tomb = null;  // Eredmény
        $res = $this->con->prepare("select Nev, ID_user from users order by Nev");
        $res->execute();
        while ($row = $res->fetch()) {
            $tomb[] = $row;
        }
        return $tomb;
    }

    // User hozzáadása
    function letterIns($pIDuser, $pDatum, $pTargy, $pLeiras)
    {
        // Eredményesség jelzésére
        $success = false;
        // Az insert kifejezés összeállítása
        $res = $this->con->prepare("insert into letters (erkezett, ID_user, targy, leiras) values (?,?,?,?)");
        // Paraméterek beállítása
        $res->bindparam(1, $pDatum);
        $res->bindparam(2, $pIDuser);
        $res->bindparam(3, $pTargy);
        $res->bindparam(4, $pLeiras);
        // SQL parancs futtatása
        $row = $res->execute();

        if ($row > 0) $success = true;

        return $success;
    }
}
