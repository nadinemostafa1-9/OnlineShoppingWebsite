
<?php
require_once('includes/productController.php');
require_once('classes/product.php');
function searchStart($k,$mPDO,&$history_id){
  $id=NULL;
  $array=[];
  $i=0;
  $term=explode(" ",$k);
  $q="SELECT * FROM `products` WHERE ";
  foreach ($term as $each) {
    $i++;

   if($i==1)
    $q.="keywords LIKE '%$each%' ";
    else
      $q.="OR keywords LIKE '%$each%' ";


    if(sizeof($term)==$i)
     $q.="OR keywords LIKE '%%' ";


  }
  $searchMetaphone = metaphone(strtolower($k)); //using the sound of the word in search
  $prepare=$mPDO->prepare($q);
  $prepare->execute();
  $f2=1; // search case
  while($r=$prepare->fetch(PDO::FETCH_ASSOC)){
    $re= explode(" ",$r['keywords']);
      $f=0;
      foreach($r as $key => $value)
       {
         //finding the first occurrence
        if (stripos($value, $k) !== false)
        { $f=2;
          break;
         }
     }

      foreach($re as $value)
      {
        //finding it by keyword sound
      if(metaphone(strtolower($value))==metaphone($searchMetaphone,2))
        $f=1;
     }
    if($f==1 || $f==2)
    {
      if($id==NULL){
        $id=$r['id'];
      }


    $product=new Product($r['id'],$r['name'],$r['category'],
   $r['price'],$r['count'],$r['image'],$r['keywords'],$r['description']);
     array_push($array, $product);

     //$f2=0;
    }

  }
  //if($f2==1)echo "No results for " . "$k";
  $history_id=$id;
  return $array;
}
