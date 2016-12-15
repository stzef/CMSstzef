<?php
namespace AppBundle\EntityExtend;


class CmsStzefParametersExtend
{ 

    public function getValue()
    {
        if($this->type == "TEXT"){
            return $this->valueText;
        }else if ($this->type == "BOOL") {
            return $this->valueBool;
        }else if ($this->type == "INT") {
            return $this->valueInt;
        }else if ($this->type == "JSON") {
            return json_decode($this->valueText);
        }
        return null;
    }   
}
