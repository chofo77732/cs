
                        function codigo(id_curso){

                  // alert(id_curso);
                  // alert(nombre);
            var user=$('#user').val();
            var email=$('#email').val();
            // alert(user);
            // alert(email);

                $.ajax({
                    url:'../Controllers/codigo.php',
                    type:'POST',
                    data:'user='+user+'&email='+email+'&id_curso='+id_curso+'&boton=enviar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        // $('#exito').html('Su cuenta ha sido registrada').show(200).delay(3000).hide(200);

                         // alert('');
                        alert("Código enviado");
                         
                    }
                    else{
                        alert(respuesta);
                    }
                    
                });
            
            
        }
