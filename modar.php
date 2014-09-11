<?php



?>
	<link rel="stylesheet" href="css/kube.css">
	<script type="text/javascript" src="js/validaciones.js"></script> 
	<script type="text/javascript" src="js/funciones.js"></script> 
	<script type="text/javascript" src="js/prefixfree.js"></script> 
	<script type="text/javascript"  src="js/prefixfree.vars.js"></script> 
	<script type="text/javascript"  src="js/jquery.min.js"></script> 
	<script type="text/javascript"  src="js/kube.js"></script> 

	<script>
$(function()
{
    $('#show-modal').on('loading.tools.modal', function(modal)
    {
        // your code
    });
});
</script>
<script>
$(function()
{
    $('#show-modal').on('opened.tools.modal', function(modal)
    {
        // your code
    });
});
</script>

<script>
$(function()
{
    $('#show-modal').on('closed.tools.modal', function()
    {
        // your code
    });
});
</script>

<button class="btn" id="show-modal"
    data-tools="modal" data-width="700" data-title="Modal Header" data-content="mantenimientoCitas.php">
    Open Modal
</button>