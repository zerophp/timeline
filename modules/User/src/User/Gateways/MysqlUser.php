<?php
namespace User\Gateways;

use acl\Core\Adapter\MysqlAdapter;

class MysqlUser extends MysqlAdapter
{
    protected $table = 'user';
    protected $idcolumn = 'iduser';
    
    public function getUsers()
    {
        $data = [];
        $query = "SELECT * FROM ".$this->table;
        $result = $this->query($query);
        $data = $this->recordSet($result);
        
        return $data;
    }
    
    public function getUserByEmailPassword($filter)
    {
        $data = [];
        $query = "SELECT * FROM ".$this->table." 
                  WHERE email ='".$filter['email']."' AND password='".$filter['password']."'";
        $result = $this->query($query);
        $data = $this->recordSet($result);
    
        return $data;
    }
    
    public function getUser($id)
    {
        $data = [];
        $query = "SELECT * FROM ".$this->table." WHERE ".$this->idcolumn." = '". $id.="'";
        $result = $this->query($query);
        $data = $this->recordSet($result);
        
        return $data;
    }
    
    private function getTableColumns($table)
    {
        $data = [];
        $query = "describe ".$table;
        $result = $this->query($query);
        $data = $this->recordSet($result);
        
        $columns=[];
        foreach ($data as $field)
        {
            $columns[] = $field['Field'];    
        }
        
        return $columns;
    }
    
    public function setUser($data)
    {
        $data['iduser']=time();
        $columns = $this->getTableColumns('user');
        
        
        $vals = [];
        foreach($data as $key => $value)
        {   
            if(in_array($key, $columns))
                $vals[] = $key."='".$value."'";
        }
        $vals = implode(",", $vals);
        
        
        $query = "INSERT INTO ".$this->table." SET ".$vals;

    
        $result = $this->query($query);
        return $result;
        
    }
    
    public function deleteUser($id)
    {
        $query = "DELETE FROM ".$this->table." WHERE ".$this->idcolumn."='".$id."'";

        $result = $this->query($query);
        
        return $result;
    }
    
    public function putUser($id, $data)
    {
        $columns = $this->getTableColumns('user');
        
        
        $vals = [];
        foreach($data as $key => $value)
        {
            if(in_array($key, $columns))
                $vals[] = $key."='".$value."'";
        }
        $vals = implode(",", $vals);
        
        $query = "UPDATE ".$this->table." SET ".$vals." WHERE ".$this->idcolumn."='".$id."'";
                
        $result = $this->query($query);
        return $result;
    }
}



















