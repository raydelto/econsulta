
	function mantenimientoCitas(id){
		window.location = 'mantenimientoCitas.php?id_paciente='+id;
	}

	function diagnostico(diagnostico){
			
	}

    function submitForm(action)
    {
        document.getElementById('form1').action = action;
        document.getElementById('form1').submit();
    }
