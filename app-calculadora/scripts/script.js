function calcular(tipo, atributo){
        if(atributo ==='c'){
            document.getElementById('resultado').value = '';
        } else if(atributo!='='){
            document.getElementById('resultado').value += atributo;
        }else{
            var resultado = eval(document.getElementById('resultado').value);
            document.getElementById('resultado').value = resultado
        }
}