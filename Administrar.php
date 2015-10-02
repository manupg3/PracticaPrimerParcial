<?php
     require_once"ClaseProductos.php";

  $nomfoto=$_FILES["archivo"]["name"];
  move_uploaded_file($_FILES["archivo"]["tmp_name"],"".$_FILES["archivo"]["name"]);
  
  if(isset($_POST['ingrese'])){
     $prod= new Producto($_POST['txtProd'],$_POST['txtStock'],$_POST['txtPrecio'],$nomfoto);
	  $prod->Agregar($prod);	 
	 
	  
	  
  }
   if(isset($_POST['sacar'])){
     $prod = $_POST['txtProd'];
	   Producto::Quitar($prod);
  }
 if(isset($_POST['listar'])){
	   $aTabla=Producto::ToArray();
	   $chunk=array_chunk($aTabla,4);
	   array_pop($chunk);
	    echo ('<pre>');	
        echo  print_r($chunk);	
		echo ('<pre>');
          
	 echo "<table border='10%' cellspading='10%' align='center' bordercolor='black' width='54%' height='30%'>";
     echo "<th>".'PRODUCTO'."</th>";
     echo "<th>".'PRECIO'."</th>";
     echo "<th>".'STOCK'."</th>";
     echo "<th>".'FOTO'."</th>"; 
	
	     for($i=0;$i<count($chunk);$i++){
	       echo "<tr>";		 
			 for($j=0;$j<3;$j++){
             
         	 echo "<td align='center' width='20%'>".$chunk[$i][$j]."</td>";       			 
			 }
          $imagenes=$chunk[$i][3];
		  echo "<td width='30%' align='center' >"."<img src='$imagenes' height='60%' width='40%'align='center' >"."</td>";
		 echo "<tr>";
         echo "</tr>";
         echo "</table>";		 
  }
  

 }
?>