<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=<?php echo SYL_ENCODE_INTERNAL; ?>">
<meta http-equiv="content-style-type" content="text/css">
<title>SyL error</title>
<style type="text/css">
<!--

body {
  text-align: center;
}

#container{
  width:      800px;
  margin-left:  auto;
  margin-right: auto;
  text-align: left;
}

#header{
  color:   #FFFFFF;
  width:   100%;
  height:  40px;
  padding: 6px 20px;
  background-color: #84ADFE;
}

#error_message{
  padding: 26px 20px 10px 20px;
  font-size: small;
}

#error_message div{
  color:       #CC0000;
  font-weight: bold;
  font-size:   medium;
}

#error_source{
  color:     #CC0000;
  padding:   10px 20px;
  font-size: small;
}

#error_source pre{
  color:   #666666;
  padding: 8px;
  border:  1px solid #99cccc;
  background-color: #DDFFFF;
  font-size: x-small;
}

#stack_trace{
  padding:   0px 20px;
  font-size: small;
}

#stack_trace table{
  padding: 0px;
  margin:  0px;
  border-collapse: collapse;
}

#stack_trace table th,
#stack_trace table td {
  color:       #666666; 
  border:      solid 1px #99cccc;
  padding:     3px;
  margin:      3px;
}

#stack_trace table th {
  background-color: #DDFFFF;
}


#stack_trace table td {
  background-color: #FFFFFF;
}

#footer{
  font-size: small;
  text-align:  right;
  width:       100%;
  margin:      30px 0px;
  padding:     8px 10px;
  border-top:  solid 1px #84ADFE
}

--> 
</style>

</head>

<body>

<div id="container">
  <div id="header">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td nowrap><span style="font-size: x-large; font-style: italic; font-weight: bold; line-height: 170%;">SyL Framework <span style="color: #FFAAAA">E</span>rror</span></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="right" width="100%">
<span style="font-size: x-small;">
[REQUEST_URI] <?php echo isset($_SERVER['REQUEST_URI']) ? htmlspecialchars($_SERVER['REQUEST_URI']) : ''; ?><br>
[USER_AGENT] <?php echo isset($_SERVER['HTTP_USER_AGENT']) ? htmlspecialchars($_SERVER['HTTP_USER_AGENT']) : ''; ?><br>
</span></td>
      </tr>
    </table>
  </div>

  <div id="error_message">
    <span style="color: #3366cc; border-bottom: dashed 1px #3366cc">Error Message</span>
    <br><br>
    <div><?php echo $_error_message; ?></div>
  </div>

<?php if ($_error_lines) { ?>
  <div id="error_source">
    <span style="color: #3366cc; border-bottom: dashed 1px #3366cc">Error Source</span>
    <br><br>
<?php
$keys  = array();
$first = true;
foreach ($_error_lines as $key => $values) {
    $display = '';
    if ($first) {
        $display = 'block';
        $first   = false;
    } else {
        $display = 'none';
    }
?>
    <pre id="file<?php echo $key ?>" style="display: <?php echo $display; ?>;"><?php echo $values; ?></pre>
<?php } ?>
<script type="text/javascript">
<!--
var source_ids = [];

document.write("|&nbsp;&nbsp;");
<?php
foreach ($_error_lines as $key => $values) {
    if ($values) {
        echo 'document.write(\'<a href="javascript: void(0);" onClick="display_source(\\\'file' . $key . '\\\')">file' . $key . '</a>&nbsp;&nbsp;|&nbsp;&nbsp;\');' . "\n";
    } else {
        echo 'document.write(\'file' . $key . '&nbsp;&nbsp;|&nbsp;&nbsp;\');' . "\n";
    }
    echo 'source_ids.push("file' . $key . '");' . "\n";
}
?>
if (source_ids[0]) {
  document.getElementById(source_ids[0]).style.display = 'block';
}
document.write("<br><br>");

function display_source(id)
{
  for (var i=0; i<source_ids.length; i++) {
    document.getElementById(source_ids[i]).style.display = 'none';
  }
  document.getElementById(id).style.display = 'block';
}

-->
</script>
  </div>
<?php } ?>

<?php if ($_error_trace) { ?>
  <div id="stack_trace">
    <span style="color: #3366cc; border-bottom: dashed 1px #3366cc">Stack Trace</span>
    <br><br>
    <table>
      <tr>
        <th>#</th>
        <th>file</th>
        <th>line</th>
        <th>function or method</th>
      </tr>
<?php foreach ($_error_trace as $values) { ?>
      <tr>
        <td><?php echo $values['no']; ?></td>
        <td><?php echo $values['file']; ?></td>
        <td align="right"><?php echo $values['line']; ?></td>
        <td><?php echo $values['function']; ?></td>
      </tr>
<?php } ?>
    </table>
  </div>
<?php } ?>

  <div id="footer">
Date: <?php echo date('Y-m-d H:i:s'); ?>&nbsp;&nbsp;SyL Framework <?php echo SYL_VERSION; ?> on PHP: <?php echo PHP_VERSION; ?><br>
<?php echo isset($_SERVER['SERVER_SOFTWARE']) ? htmlspecialchars($_SERVER['SERVER_SOFTWARE']) : ''; ?><br>
<?php echo php_uname(); ?><br>
  </div>

</div>

</body>
</html>
