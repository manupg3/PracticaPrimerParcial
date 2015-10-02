<?php

  class Producto{
	  private $_nombre;
	  private $_stock;
	  private $_precio;
	  private $_foto;
	  
	  public function __construct($nombre,$stock,$precio,$foto){
		  $this->_nombre=$nombre;
		  $this->_stock=$stock;
		  $this->_precio=$precio;
		  $this->_foto=$foto;
	  }
	  public function GetNom(){
		  return $this->_nombre;
	  }
	  public function GetStock(){
		  return $this->_stock;
	  }
      public function GetPrecio(){
		  return $this->_precio;
	  }
      public function GetFoto(){
		  return $this->_foto;
	  }	  
	  
   public function ToString(){
	return $this->GetNom().",".$this->GetStock().",".$this->GetPrecio().",".$this->GetFoto().",";
		  
	  }
	  public function Agregar($prod){
		   $prod=$prod->ToString();  
			 
		 if(isset($_POST['txtProd'])==null){
			 $prod=null;
	  }	  
		if($prod!=null){
		    $ar=fopen("Productos.txt","a+");
			$cant=fwrite($ar,$prod);
			fclose($ar);
		}  
         if($prod==null){
			 echo "NO SE PUDO GUARDAR...";
		 }		  
		 if($prod!=null){
			 echo "SE GUARDO CON EXITO...";
		 }		    
	  }
	  public function ToArray(){
		  
		$ar=fopen("Productos.txt","r");
		$cadena=fread($ar,filesize("Productos.txt"));
		fclose($ar);
		$listaP=explode(",",$cadena);
	    echo ('<pre>');	
        echo  print_r($listaP);	
		echo ('<pre>');		 
		return $listaP;
		 }
	  public static function Quitar($prod){
		  $lista=array();
		 $lista = Producto::ToArray();
         $aux=array_chunk($lista,4); 
          array_pop($aux);		 
        echo ('<pre>');	
        echo  print_r($aux);	
		echo ('<pre>');
        foreach($aux as $keys=> $valor){
	       if($prod==$valor[0]){
			   unset($aux[$keys]);
		   }		
		}
		
		    foreach($aux as $dat){
		foreach($dat as $da){
		    $atxt[]=$da;  	
	     	}		
		}
		 if($aux==null){
			unlink("Productos.txt"); 
		 }
		 else{
	     $cadena=implode(",",$atxt);
          $ar=fopen("Productos.txt","w");
          $cant=fwrite($ar,$cadena.",");		  
		  fclose($ar);
		 }
	  }	 	 
	}
	  
  
  

?>