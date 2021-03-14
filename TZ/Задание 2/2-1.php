<?php 
 
	// ПРИМЕР ФАЙЛА. 
	$filename = 'eb2292e2468b4c18e2d53af2fec73f26.jpg'; 

	// ПРОВЕРКА НА ИЗОБРАЖЕНИЕ
	$size = getimagesize($filename); // если это изображение и у него определён размер, то продолжаем
	list($width_orig, $height_orig) = getimagesize($filename);
	$height_orig = $height_orig/2;
	// ОПРЕДЕЛЯЕМ МАКСИМАЛЬНЫЕ ШИРИНУ И ВЫСОТУ ИЗОБРАЖЕНИЯ
	$width = 200; 
	$height = 100; 
	// РАБОТАЕМ КОРРЕКТНО. ОПРЕДЕЛЯЕМ ТИП
	header("Content-type: {$size['mime']}");

	// ПОЛУЧАЕМ НОВЫЕ РАЗМЕРЫ
	 

	// if ($width && ($width_orig < $height_orig)) { 
	//     $width = ($height / $height_orig) * $width_orig; 
	// } else { 
	//     $height = ($width / $width_orig) * $height_orig; 
	// } 
	// ПЕРЕСОХРАНЯЕМ ИЗОБРАЖЕНИЕ
	$image_p = imagecreatetruecolor($width, $height); 
	$image = imagecreatefromjpeg($filename); 
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig); 

	// СОЗДАЁМ
	imagejpeg($image_p, null, 100); 
	// УДАЛЯЕМ ИСХОДНИК - НУЖЕН АДРЕС. НАПРИМЕР, images/img001.jpg
	// unlink ($filename);

 ?>

