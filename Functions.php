<?php



function _echo($args, $type='print_r', $trace=true){
	$colors = array('#d2faf4', '#f0ebb9', '#aad28a', '#f0b9b9', '#2f95eb');
	$colors2 = array('#115b9a', '#9d3a3a', '#437818', '#948917', '#1f7266');
	echo '<meta charset="UTF-8">';
	echo "<div style=\"font-family:'Courier New'; font-size:12px; border: 1px solid #000; overflow:auto; margin:5px; padding:5px;\">";
	if ($trace){
		$trace_num = rand(1, 10000);
		$trace_stack = debug_backtrace(); array_shift($trace_stack);
		echo "<a style='color:#000000;text-decoration:none;border-bottom:#000000 dashed 1px;' onclick=\"document.getElementById('_debug_trace_".$trace_num."').style.display = document.getElementById('_debug_trace_".$trace_num."').style.display=='none' ? 'block' : 'none';\">stack trace</a>";
		echo "<pre style='margin:5px;padding:5px;display:none;' id='_debug_trace_".$trace_num."'>";
		foreach ($trace_stack as $i=>$tr){
			$func_args = "";
			$func_args_dots = "()   ";
			if (!empty($tr['args'])){
				$func_args_dots = "(<a style='color:#000000;text-decoration:none;border-bottom:#000000 dashed 1px;' onclick=\"document.getElementById('_func_args_".$trace_num.$i."').style.display = document.getElementById('_func_args_".$trace_num.$i."').style.display=='none' ? 'block' : 'none';\">...</a>)";
				$func_args .= "<div id='_func_args_".$trace_num.$i."' style='margin-left:50px;display:none;'>";
				foreach ($tr['args'] as $j=>$farg){
					ob_start();
					if (empty($farg)) var_dump($farg);
					else print_r($farg);
					$arg_content = ob_get_contents();
					ob_end_clean();
					$func_args .= '<hr size=1 color="#000">';
					$func_args .= "<font style='color:".$colors2[$j%count($colors2)].";'>".trim($arg_content)."</font><br>";
				}
				$func_args .= "</div>";
			}
			echo sprintf('% 2d',$i).'# '.$func_args_dots.' '.sprintf('%-60s', (!empty($tr['class']) ? $tr['class'] : NULL).(!empty($tr['type']) ? $tr['type'] : NULL).$tr['function'].'('.count($tr['args']).')').'['.sprintf('%3s',$tr['line']).':'.$tr['file'].']';
			echo $func_args;
			echo "<br>";
		}
		echo "</pre>";
	}
	foreach ($args as $i=>$arg){
		echo '<pre style="background:'.$colors[$i%count($colors)].';margin:5px;padding:5px;">';
		switch ($type){
			case 'var_dump': var_dump($arg); break;
			default: if (empty($arg)) var_dump($arg); else print_r($arg); break;
		}
		echo '</pre>';
	}
	echo "</div>\n";
}

function _print_r($_ = null){
	_echo(func_get_args(), 'print_r');
}
