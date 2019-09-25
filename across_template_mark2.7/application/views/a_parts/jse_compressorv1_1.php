<?php

function compress_html($buffer) {
$search = array('/\>[^\S ]+/s','/[^\S ]+\</s', '/(\s)+/s'); $replace = array('>','<','\\1'); $buffer = preg_replace($search, $replace, $buffer);
 return $buffer;
}
function compress_js($buffer) { $buffer = preg_replace('/([;])\s+/', '$1', $buffer); $buffer = preg_replace('/([}])\s+(else)/', '$1else', $buffer); $buffer = preg_replace('/([}])\s+(var)/', '$1;var', $buffer); $buffer = preg_replace('/([{};])\s+(\$)/', '$1\$', $buffer);
return $buffer;
}
?>
