<?PHP
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
  // initialise image with dimensions of 120 x 30 pixels
  $image = @imagecreatetruecolor(120, 30) or die("Cannot Initialize new GD image stream");

  // set background to white and allocate drawing colours
  $background = imagecolorallocate($image,0x80, 0x00, 0x00 );
  imagefill($image, 0, 0, $background);
  $linecolor = imagecolorallocate($image, 0x00, 0x00, 0x00);
  $textcolor = imagecolorallocate($image, 0x87, 0xCE, 0xFA);

  // draw random lines on canvas
  for($i=0; $i < 8; $i++) {
    imagesetthickness($image, rand(1,5));
    imageline($image, 0, rand(0,30), 120, rand(0,30), $linecolor);
  }

  session_start();
  // add random digits to canvas
  $digit = '';
  for($x = 15; $x <= 95; $x += 20) {
    $digit .= ($num = rand(0, 9));
    imagechar($image, rand(3, 5), $x, rand(2, 14), $num, $textcolor);
  }

  // record digits in session variable
  $_SESSION['digit'] = $digit;

  // display image and clean up
  header("Content-type: image/png");
  imagepng($image);
  imagedestroy($image);
?>