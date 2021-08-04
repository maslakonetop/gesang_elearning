<?php
	foreach($query->result() as $tmpl)
	{
		echo "".$tmpl->nama_mk."<br>";
	}
		echo $paginator;
?>