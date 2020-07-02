<?php 
if(isset($_SESSION['cart']))
{
		if(count($_SESSION['cart'])>0)
	{
		echo count($_SESSION['cart']);
	}
}

?>