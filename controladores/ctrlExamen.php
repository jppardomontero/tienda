<?php
class ControladorExamen{
    //Función para recibir los datos para gurardar cliente
    public function crtlGuardarProductos(){
        
        if (isset($_POST['nombre']) &&
            isset($_POST['cantidad']) &&   
            isset($_POST['stock']) &&       
            isset($_POST['proveedor'])){ 
                $tabla ="productos";
                $data = array('nombre' => $_POST['nombre'],    
                             'cantidad' => $_POST['cantidad'],
                             'stock' => $_POST['stock'],
                             'proveedor' => $_POST['proveedor']);
                
                $res = ModeloExamen::mdlGuardarProductos($tabla, $data);
                if($res == 'ok'){
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title: "¡Datos de productos guardados Correctamente...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "examen";
                        }
                    })
                  </script>';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon:"error",
                        title: "¡Datos de produtos no se puden ser guardados...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "examen";
                        }
                    })
                  </script>';

                }
            }
    }

    //Función para cargar datos del cliente
    public static function ctrlCargarProducto($parametro, $id){
        $tabla = "productos";
        $datosCliente = ModeloExamen::mdlCargarProdutos($tabla, $parametro, $id);
        return $datosCliente;
    }

    

    //Función par actualizar datos
    public static function ctrlActualizarCliente(){
        if (isset($_POST['modificar_cedula']) &&
        isset($_POST['modificar_nombre']) &&
        isset($_POST['modificar_apellido']) &&
        isset($_POST['modificar_direccion']) &&
        isset($_POST['modificar_telefono']) &&
        isset($_POST['modificar_correo'])){
            $tabla ="cliente";
            $data = array('cedula' => $_POST['modificar_cedula'],
                         'nombre' => $_POST['modificar_nombre'],
                         'apellidos' => $_POST['modificar_apellido'],
                         'direccion' => $_POST['modificar_direccion'],
                         'telefono' => $_POST['modificar_telefono'],
                         'email' => $_POST['modificar_correo'],
                         'id_cliente' => $_POST['id']);
            $res = ModeloCliente::mdlActualizarCliente($tabla, $data);
            if($res == 'ok'){
                echo '<script>
                Swal.fire({
                    icon:"success",
                    title: "¡Datos de cliente actualizados Correctamente...!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "cliente";
                    }
                })
              </script>';
            } else{
                echo '<script>
                Swal.fire({
                    icon:"error",
                    title: "¡Datos de cliente no se puden ser actualizados...!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "cliente";
                    }
                })
              </script>';
                                                     
            }
        }

    }

   public static function ctrlEliminarClientes($id) {
    
    $tabla = "cliente"; 
    $datosCliente = ModeloCliente::mdlEliminarCliente($tabla, $id);
    return $datosCliente;
   }
}

