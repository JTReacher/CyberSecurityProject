<?php

?>

<html>
<head><title>Add Module</title></head>
<body>
<h2>Form for adding module info. When you have added your marks for each module go to academic record</h2>
<!-- TODO: Add module controller for this form to call -->
<form action="ModuleController.php" method="post">
<!-- create radio buttons -->
<p>Module: Select module and input information <br><br>
<input type="radio" name="moduleId" value="COMP7001">COMP7001 </input>
<input type="radio" name="moduleId" value="COMP7002">COMP7002</input>
<input type="radio" name="moduleId" value="TECH7005">TECH7005</input>
<input type="radio" name="moduleId" value="DALT7002">DALT7002</input>
<input type="radio" name="moduleId" value="DALT7011">DALT7011</input>
<input type="radio" name="moduleId" value="SOFT7003">SOFT7003</input>
<input type="radio" name="moduleId" value="TECH7004">TECH7004</input>
<input type="radio" name="moduleId" value="TECH7009">TECH7009</input>
</p>
<!-- create dropdown list -->
<p>Mark Achieved in module: <br><br>
<input type="number" min=0 max=100 name=markAchieved> 
</p>
<input type="submit" name="submit" value="Submit Form"><br >
</form>
</body>
</html>