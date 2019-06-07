<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/recursos/DatosPersonal.php');
require_once(APPPATH.'libraries/Personal.php');

class Recepcionista extends Personal{
    private $iRecepcionista;

    public function __get($attr) {
		return CI_Controller::get_instance()->$attr;
    }
    
    public function __construct(){
        
    }

    private function validarDatosPersonalesRecepcionista(){
        $datosRecepcionista = DatosPersonal::VALIDO;
        if($this->getNumeroTelefono() === "" || $this->getNumeroTelefono() === null){
            $datosRecepcionista = DatosPersonal::NUMERO_TELEFONO_VACIO;
        }else if(strlen($this->getNumeroTelefono()) > 10){
            $datosRecepcionista = DatosPersonal::NUMERO_TELEFONO_LARGO;
        }else if(strlen($this->getNumeroTelefono()) < 10){
            $datosRecepcionista = DatosPersonal::UMERO_TELEFONO_CORTO;
        }else if($this->getNombre() === "" || $this->getNombre() === null){
            $datosRecepcionista = DatosPersonal::NOMBRE_VACIO;
        }else if(strlen($this->getNombre()) > 70){
            $datosRecepcionista = DatosPersonal::NOMBRE_LARGO;
        }else if($this->getApellido()==="" || $this->getApellido() === null){
            $datosRecepcionista = DatosPersonal::APELLIDO_VACIO;
        }else if(strlen($this->getApellido()) > 70){
            $datosRecepcionista = DatosPersonal::APELLIDO_LARGO;
        }else if($this->getFechaNacimiento() === "" || $this->getFechaNacimiento() === null){
            $datosRecepcionista = DatosPersonal::FECHA_VACIA;
        }else if($this->getSexo()==""){
            $datosRecepcionista = DatosPersonal::SEXO_VACIO;
        }else  if($this->getRfc()==="" || $this->getRfc() === null){
            $datosRecepcionista = DatosPersonal::RFC_VACIO;
        }else if(strlen($this->getRfc()) > 13){
            $datosRecepcionista = DatosPersonal::RFC_LARGO;
        }else if(strlen($this->getRfc())< 13){
            $datosRecepcionista = DatosPersonal::RFC_CORTO;
        }else if($this->getNumeroPersonal()==="" || $this->getNumeroPersonal() === null){
            $datosRecepcionista = DatosPersonal::NUMERO_PERSONAL_VACIO;
        }else if($this->getTurno()==="" || $this->getTurno() == null){
            $datosRecepcionista = DatosPersonal::TURNO_VACIO;
        }
        return $datosRecepcionista;
    }

    public function iRecepcionista($iRecepcionista){
        $this->iRececionista = $iRecepcionista;
    }

    public function registrar(){
        $datosPersonal = $this->validarDatosPersonalesRecepcionista();
        if($datosPersonal ===  DatosPersonal::VALIDO){
            if($this->obtenerPersonal($this->getNumeroPersonal()) === null){
                if($this->iRecepcionista->registrar($this)){
                    $datosPersonal = DatosPersonal::EXITO;
                }else{
                    $datosPersonal = DatosPersonal::ERROR_ALMACENAMIENTO;
                }
            }
        }
        return $datosPersonal;
    }

    public function modificar(){
        $modificar = $this->validarDatosPersonalesRecepcionista();
        if($modificar == DatosPesonal::VALIDO){
            if($this->iRecepcionista->modificar($this)){
                $modificar = DatosPersonal::EXITO;
            }else{
                $modificar = DatosPersonal::ERROR_ALMACENAMIENTO;
            }
        }
        return $modificar;
    }

    public function registrarEntrada($numeroConsultorio){
        $entradaRegistrada = false;
        if($numeroConsultorio != ""){
            $entradaRegistrada = $this->iRecepcionista->registrarEntrada($numeroConsultorio);
        }
        return $entradaRegistrada;
    }

    public function registrarSalida(){
        return $this->iRecepcionista->registrarSalida($this->getNumeroPersonal());
    }
    
    public function eliminar(){
        return $this->irecepcionista->eliminar($this->getNumeroPersonal());
    }

    public abstract function obtenerPersonal($numeroPersonal){
        return $this->iRecepcionista->obtenerPersonal($numeroPersonal);
    }

    public function agregarConsulta($consulta){
        return $this->iRecepcionista->agregarConsulta($consulta);
    }

    public function obtenerCitas($fecha){
        return $this->iRecepcionista->obtenerCitas($fecha);
    }

}