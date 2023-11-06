<?php
include "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head> 
    
<title>U Dictionary</title>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="i.css" 
</head>
<body>
<h1> UDIT DICTIONARY</h1>
<style> h1 {color:green;} </style>

<form method="post">
Word   <input type="text" placeholder="Enter word here..." name ="search">
<br>
<br>

<button name="submit">Submit</button>
</form>
<div class="container">
            <?php
            if(isset($_POST['submit'])){
                $search=$_POST['search'];
             //   $sql= "select * from `words` where word= '$search'";
              $sql="select `words`.`word`,`words`.`definition`,`pos`.`Part_of_speech`,`pos`.`syllable`,`pos`.`pronunciation`,`lang`.`Hindi`,`lang`.`Tamil`,`lang`.`Gujarati`,`mean`.`meaning2`,`words`.`example`,`mean`.`example2`,`sym`.`sym1`,`sym`.`sym2`,`ant`.`antm`,`liventity`.`Scientific_name`,`liventity`.`Pic` 
               from `words` inner join `pos` on `words`.`wid`=`pos`.`wid` inner join `lang` on `pos`.`wid`=`lang`.`wid` inner join `mean` on `lang`.`wid`=`mean`.`wid` inner join `sym` on `mean`.`wid`=`sym`.`wid` inner join `ant` on `sym`.`wid`=`ant`.`wid` inner join `liventity` on `ant`.`wid`=`liventity`.`wid` and `words`.`word`='$search'";
               $result=mysqli_query($con,$sql);
                if($result){
                   if( $num=mysqli_num_rows($result) >0 ){
                    echo '<thead>
                    <tr>
                    <th></th>
                        <th></th>
                         </tr>
                         </thead><br>';
                         $row=mysqli_fetch_assoc($result);
                         echo '<tbody>
                         <tr><p> <h3><b>Word results :</b></h3> 
                        <b>Word :</b>  <td>'.$row['word'].'</td><br> 
                        <b>Syllable :</b>      <td>'.$row['syllable'].'</a></td><br>
                        <b>Pronunciation:</b>      <td>'.$row['pronunciation'].'</td><br>
                        <b>Meaning :</b>      <td>'.$row['definition'].'</a></td><br>
                        <b>:</b>      <td>'.$row['meaning2'].'</a></td><br>
                        <b>Scientific Name :</b>      <td>'.$row['Scientific_name'].'</td><br>
                        <b>Part of Speech :</b>     <td>'.$row['Part_of_speech'].'</a></td><br>
                        <b>Example :</b>      <td>'.$row['example'].'</a></td><br>
                        <b> :</b>      <td>'.$row['example2'].'</td><br>
                        <b>Synonyms :</b>      <td>'.$row['sym1'].'</a></td><br>
                        <b> :</b>      <td>'.$row['sym2'].'</td><br>
                        <b>Antonym :</b>           <td>'.$row['antm'].'</a></td><br><br>
                        
                        <b> In other Languages:</b> <br> <br><b>Hindi :</b>      <td>'.$row['Hindi'].'</a></td><br>
                        <b>Tamil :</b>      <td>'.$row['Tamil'].'</a></td><br>
                        <b>Gujarati :</b>     <td>'.$row['Gujarati'].'</a></td><br>
                        
                        <b>"<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row['Pic']).'"/></b> <br><br><br>          <td>'.$row['Pic'].'</a></td><br><br>
                        
                            </p>  </tr>
                              </tbody>';
                              
                 
                   } 
                   else{
                    echo "<h2><b>Word Not Found in Dictionary</b></h2>";
                   }
                }
            }
            
                        ?>
                        
                    </div>
                </div>





</body>

</html>



