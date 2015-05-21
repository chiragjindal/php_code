
<?php

function readline( $prompt = '' )
{
    echo $prompt;
    return rtrim( fgets( STDIN ), "\n" );
}
readline();
?>
