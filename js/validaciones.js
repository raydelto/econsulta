

function valida_cedula(ced) {  
    var c = ced.replace(/-/g,'');  
    var Cedula = c.substr(0, c.length - 1);  
    var Verificador = c.substr(c.length - 1, 1);  
    var suma = 0;  
    if(ced.length < 13) { return false; }  
    for (i=0;i < Cedula.length;i++) {  
        mod = "";  
         if((i % 2) == 0){mod = 1} else {mod = 2}  
         res = Cedula.substr(i,1) * mod;  
         if (res > 9) {  
              res = res.toString();  
              uno = res.substr(0,1);  
              dos = res.substr(1,1);  
              res = eval(uno) + eval(dos);  
         }  
         suma += eval(res);  
    }  

      console.log(cedula);
    el_numero = (10 - (suma % 10)) % 10;  
    if (el_numero == Verificador && Cedula.substr(0,3) != "000") {  
      alert("La Cedula es valida");  
      console.log(el_numero);
    }  
    else   {  
     alert("La Cedula es Ilegal");  
     console.log(cedula);
    }  


}

function validarFecha(fc)
{
	rs=true;
	if(fc != "")
	{
		
		rs = /^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9])$/.test(fc);
	}
	return rs;
}

var filters = {
			requerido: function(el) {return ($(el).val() != '' && $(el).val() != -1);},
			email: function(el) {return /^[A-Za-z.+][A-Za-z0-9_.+]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/.test($(el).val());},
			telefono: function(el){return /^[0-9]*$/.test($(el).val());},
	
			entero: function(el){return /^[0-9]*$/.test($(el).val());},
		   decimal: function(el){return /^[-]?([1-9]{1}[0-9]{0,}(\.[0-9]{0,2})?|0(\.[0-9]{0,2})?|\.[0-9]{1,2})$/.test($(el).val());},
			ceduladom: function(el){return verificarCedula($(el).val());},
			fechamysql: function(el){return validarFecha($(el).val());}
		
			
		};