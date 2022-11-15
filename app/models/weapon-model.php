<?php

class WeaponModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
    }


    public function getAll($sort = null, $order = null, $id_categorie = null) {


        if ((empty($sort)) && (empty($order)) && (empty($id_categorie))) {

            $query = $this->db->prepare("SELECT * FROM weapons");
            $query->execute();

            $weapons = $query->fetchAll(PDO::FETCH_OBJ);

            return $weapons;
        }


        else if (!empty($sort) && !empty($order)) {


            if($order == 'asc') {

                if ($sort == 'weapon_name') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY weapon_name ASC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ);
            
                    return $weapons;
                }

                else if ($sort == 'id_categorie') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY id_categorie ASC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }
                
                else if ($sort == 'price') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY price ASC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }
                else if ($sort == 'damage') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY damage ASC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }
                else if ($sort == 'bullets') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY bullets ASC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }
                else if ($sort == 'reach') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY reach ASC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }

            }

            else if ($order == 'desc') {

                if ($sort == 'weapon_name') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY weapon_name DESC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }

                else if ($sort == 'id_categorie') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY id_categorie DESC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }
                
                else if ($sort == 'price') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY price DESC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }
                else if ($sort == 'damage') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY damage DESC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }
                else if ($sort == 'bullets') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY bullets DESC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }
                else if ($sort == 'reach') {
                    $query = $this->db->prepare("SELECT * FROM weapons ORDER BY reach DESC");
                    $query->execute();
    

                    $weapons = $query->fetchAll(PDO::FETCH_OBJ); 
            
                    return $weapons;
                }


            }

            else {
                
            }

        }

        else if (!empty($id_categorie)) {
            $query = $this->db->prepare("SELECT * FROM weapons WHERE id_categorie = ?");
            $query->execute([$id_categorie]);
    

            $weapons = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $weapons;
        }


    }
    
    

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM weapons WHERE id = ?");
        $query->execute([$id]);
        $weapon = $query->fetch(PDO::FETCH_OBJ);
        
        return $weapon;
    }


    public function insert($weapon_name, $id_categorie, $price, $damage, $bullets, $reach) {
        $query = $this->db->prepare("INSERT INTO weapons (weapon_name, id_categorie, price, damage, bullets, reach) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$weapon_name, $id_categorie, $price, $damage, $bullets, $reach]);

        return $this->db->lastInsertId();
    }



    function delete($id) {
        $query = $this->db->prepare('DELETE FROM weapons WHERE id = ?');
        $query->execute([$id]);
    }

    public function edit($weapon_name, $categorie, $price, $damage, $bullets, $reach, $id) {
        $query = $this->db->prepare('UPDATE weapons SET weapon_name = ?, id_categorie = ?, price = ?, damage = ?, bullets = ?, reach = ? WHERE id = ?');
        $query->execute([$weapon_name, $categorie, $price, $damage, $bullets, $reach, $id]);

    }
}









/*public function getAll($sort = null, $order = null, $id_categorie = null) {


    if ((empty($sort)) && (empty($order)) && (empty($id_categorie))) {

        $query = $this->db->prepare("SELECT * FROM weapons");
        $query->execute();

        $weapons = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos

        return $weapons;
    }

    else if (!empty($sort) && !empty($order)) {
        $query = $this->db->prepare("SELECT * FROM weapons ORDER BY ? ?");
        $query->execute([$sort, $order]);


        $weapons = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $weapons;
    }

    else if (!empty($id_categorie)) {
        $query = $this->db->prepare("SELECT * FROM weapons WHERE id_categorie = ?");
        $query->execute([$id_categorie]);


        $weapons = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $weapons;
    }


}*/