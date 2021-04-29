<?php
    namespace Clases;
    require '../vendor/autoload.php';
    use Clases\Conexion;
    use PDO;
    use PDOException;

    class Articulos extends Conexion{
        private $id;
        private $nombre;
        private $pvp;
        private $stock;

        public function create(){
            $c="insert into articulos(nombre,pvp,stock) values (:n, :p, :s)";
            $stmt=parent::$conexion->prepare($c);
            try{
                $stmt->execute([
                ':n'=>$this->nombre,
                ':C'=>$this->pvp,
                ':s'=>$this->stock
                ]);
            }catch(PDOException $ex){
                die("Error al crear el articulo ".$ex->getMessage());
            }

        }

        public function read(){
            $cons="select id,nombre,pvp,stock from articulos";
            $stmt=$this->conector->prepare($cons);
            try{
                $stmt->execute();
            }catch(PDOException $ex){
                die("Error al recuperar articulos ".$ex->getMessage());
            }
            $todos=$stmt->fetchAll(PDO::FETCH_OBJ);
            return $todos;
        }

        public function update(){
            $u="update articulos";
            $stmt=$this->conector->prepare($u);
            try{
                $stmt->execute([
                ':n'=>$this->nombre,
                ':C'=>$this->pvp,
                ':s'=>$this->stock
                ]);
            }catch(PDOException $ex){
                die("Error al modificar el articulo ".$ex->getMessage());
            }
        }

        public function delete(){
            $d="delete from articulos where :n=nombre AND :s=stock";
            $stmt=$this->conector->prepare($d);
            try{
                $stmt->execute([
                ':n'=>$this->nombre,
                ':C'=>$this->pvp,
                ':s'=>$this->stock
                ]);
            }catch(PDOException $ex){
                die("Error al borrar el articulo ".$ex->getMessage());
            }

        }

        public function deleteAll(){
            $del= "delete from articulos";
            $stmt=parent::$conexion->prepare($del);
            try{
                $stmt->execute();
            }catch(PDOException $ex){
                die("Error al borrar todos los articulos ".$ex->getMessage());
            }
        }
    }