

<script type="text/javascript">

   function setCookie()
   {
    document.cookie="username=John Doe; expires=date()+10;";
   }
</script>
<?php

echo '<script> setCookie();</script>';
?>