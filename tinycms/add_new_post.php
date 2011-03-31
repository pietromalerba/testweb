<?php
require_once 'orm/post.php';
require_once 'model/model_post.php';
$obj_post = new model_post();

$user = $facebook->api('/'.$userid);

$real_img_path = "/images/real/";
$thumb_img_path = "/images/thumbnail/";

if(isset($_POST['title']))
{

	if($_FILES['primary_image']['size']!=0)
	{
					$error = 0;
					if ($_FILES['primary_image']['size'] > 2097152 )
					{
						$error=1;

					}
					if (!getimagesize($_FILES['primary_image']['tmp_name']))
					{ 
						$error=2;
						
					}
					
					$blacklist = array(".php", ".phtml", ".php3", ".php4", ".js", ".shtml", ".pl" ,".py");
					
					foreach ($blacklist as $file)
					{
						if(preg_match("/$file\$/i", $_FILES['primary_image']['name']))
						{
							$error=3;

						}
					}
					
					if($error == 0)
					{
								
								$obj_post->set_user_id($user['id']);
								$obj_post->set_title($_POST['title']);
								$obj_post->set_description($_POST['description']);
								$obj_post->set_price($_POST['price']);
								$obj_post->set_start_date($_POST['start_date']);
								$obj_post->set_end_date($_POST['end_date']);
								$obj_post->set_button_label($_POST['button_label']);
								$obj_post->set_page_id($_POST['page_id']);
	
								$check_insert = $obj_post->insert_post();
								
								$uni_name = mysql_insert_id();
								
								if($type==2)
								{
											$ext=".jpg";
											// This is the temporary file created by PHP
$uploadedfile = $_FILES['primary_image']['tmp_name'];

// Create an Image from it so we can do the resize
$src = imagecreatefromjpeg($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=90;
$newheight=90;
//$newheight=($height/$width)*220;

$tmp=imagecreatetruecolor($newwidth,$newheight);

// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filename =$_SERVER['DOCUMENT_ROOT'].$thumb_img_path.$uni_name.".jpg"; 
//$pollImagePath."/".$pollId.".jpg";

$up_one=imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
// has completed.
}



//for gif



if($type==1)
{
 $ext=".gif";
// This is the temporary file created by PHP
$uploadedfile = $_FILES['primary_image']['tmp_name'];

// Create an Image from it so we can do the resize
$src = imagecreatefromgif($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=90;
$newheight=90;
//$newheight=($height/$width)*220;
$tmp=imagecreatetruecolor($newwidth,$newheight);

// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filename =$_SERVER['DOCUMENT_ROOT'].$thumb_img_path.$uni_name.".gif"; 
//$pollImagePath."/".$pollId.".jpg";

$up_one=imagegif($tmp,$filename);
imagedestroy($src);
imagedestroy($tmp); 


}


//for png


if($type==3)
{
$ext=".png";
// This is the temporary file created by PHP
$uploadedfile = $_FILES['primary_image']['tmp_name'];

// Create an Image from it so we can do the resize
$src = imagecreatefrompng($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=90;
$newheight=90;
$newheight=($height/$width)*220;
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
// this line actually does the image resizing, copying from the original
// image into the $tmp image
$filename =$_SERVER['DOCUMENT_ROOT'].$thumb_img_path.$uni_name.".png"; 
//$pollImagePath."/".$pollId.".jpg";

$up_one=imagepng($tmp,$filename,0,PNG_NO_FILTER);
imagedestroy($src);
imagedestroy($tmp);


}



if($up_one==1)
{

list($width, $height, $type, $attr) = getimagesize($_FILES['primary_image']['tmp_name']);
if($width>600)
 {
 
 if($type==2)
{
$ext=".jpg";
// This is the temporary file created by PHP
$uploadedfile = $_FILES['primary_image']['tmp_name'];

// Create an Image from it so we can do the resize
$src = imagecreatefromjpeg($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=600;
$newheight=($height/$width)*600;

$tmp=imagecreatetruecolor($newwidth,$newheight);

// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filename =$_SERVER['DOCUMENT_ROOT'].$real_img_path.$uni_name.".jpg"; 
//$pollImagePath."/".$pollId.".jpg";

$up_two=imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
// has completed.
}
//for gif
if($type==1)
{
 $ext=".gif";
// This is the temporary file created by PHP
$uploadedfile = $_FILES['primary_image']['tmp_name'];

// Create an Image from it so we can do the resize
$src = imagecreatefromgif($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=600;
$newheight=($height/$width)*600;
$tmp=imagecreatetruecolor($newwidth,$newheight);

// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$filename =$_SERVER['DOCUMENT_ROOT'].$real_img_path.$uni_name.".gif"; 
//$pollImagePath."/".$pollId.".jpg";

$up_two=imagegif($tmp,$filename);
imagedestroy($src);
imagedestroy($tmp); 


}
//for png
if($type==3)
{
$ext=".png";
// This is the temporary file created by PHP
$uploadedfile = $_FILES['primary_image']['tmp_name'];

// Create an Image from it so we can do the resize
$src = imagecreatefrompng($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=600;
$newheight=($height/$width)*600;
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
// this line actually does the image resizing, copying from the original
// image into the $tmp image
$filename =$_SERVER['DOCUMENT_ROOT'].$real_img_path.$uni_name.".png"; 
//$pollImagePath."/".$pollId.".jpg";

$up_two=imagepng($tmp,$filename,0,PNG_NO_FILTER);
imagedestroy($src);
imagedestroy($tmp);


}

 
 }
 else
 {
//$target_path = "http://linkdoo.com/tagmyphoto/cat_images/";
$target_path = $_SERVER['DOCUMENT_ROOT'].$real_img_path;
//echo basename($_FILES['primary_image']['name']);
$target_path = $target_path .$uni_name.$ext; //basename( $_FILES['primary_image']['name']); 
//echo $target_path;
//echo $_FILES['primary_image']['tmp_name'];
if(move_uploaded_file($_FILES['primary_image']['tmp_name'], $target_path)) 
{
    $up_two=1;
	//echo "The file ".  basename( $_FILES['primary_image']['name']). " has been uploaded";
}
 else
 {
    $up_two=0;//echo "There was an error uploading the file, please try again!";
}

}


}





						
								
	}
	
}
	
	
	
	if($check_insert == true)
	{
		header('Location:index.php?p=home&c_i_p=1');
	}
	else
	{
		header('Location:index.php?p=home&c_i_p=0');
	}
	
}

?>

