<?php
function index_md($in)
{
  $index = array();
  $index[0] = 0;
  $in2 = explode( "\n", $in );
  foreach( $in2 as $inln)
  {
    $temp = trim( $inln );
    if( $temp[0] == '#' )
    {
      //if there is a "#", count how many so we know the depth.
      $depth = 0;
      while( $temp[$depth] == '#' )
      {
        ++$depth;
      }
      --$depth;
      $index[$depth]++;
      for( $i = $depth+1; $i < count( $index ); ++$i )
      {
        $index[$i] = 0;
      }

      //add spaces
      for( $i = 0; $i < $depth; ++$i)
      {
        echo '  ';
      }
      echo '- ';
      //print the number
      for( $i = 0; $i <= $depth; ++$i)
      {
        echo $index[$i], '.';
      }
      $title = trim(substr( $temp, $depth+1));
      $link = $title;
      $link_c = strlen($link);
      for( $i = 0; $i < $link_c; ++$i)
      {
        if( $link[$i] == ' ') 
        $link[$i] = '-';
      }
      echo ' [', $title, '](#', $link , ")\r\n";
    }
  }
  return "hi";
}

$in = file_get_contents("in.md");
$out = index_md($in);
echo $out;
?>
