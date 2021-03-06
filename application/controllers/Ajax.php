<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('ajax_Model', 'ajax');
    }


    public function secciones_por_area($id_area)
    {
        $secciones = $this->ajax->obtener_secciones_por_area($id_area);

        $select = '';

        if(count($secciones) == 0){
            $select .= '<option value="">No hay registros asociados</option>';
        } else {
            $select .= '<option value="">Seleccione sección...</option>';
            foreach($secciones as $s){
                $select .= '<option value="'.$s->seccion_id.'">'.$s->seccion.'</option>';
            }
        }

        echo $select;

    }


    public function riesgo_por_contexto($id_area)
    {
        $secciones = $this->ajax->obtener_riesgos_por_contexto($id_area);

        $select = '';

        if(count($secciones) == 0){
            $select .= '<option value="">No hay registros asociados</option>';
        } else {
            $select .= '<option value="">Seleccione riesgo...</option>';
            foreach($secciones as $s){
                $select .= '<option value="'.$s->seccion_id.'">'.$s->seccion.'</option>';
            }
        }

        echo $select;

    }


    public function procesos_por_seccion($id_seccion)
    {
        $procesos = $this->ajax->obtener_procesos_por_seccion($id_seccion);

        $select = '';

        if(count($procesos) == 0){
            $select .= '<option value="">No hay registros asociados</option>';
        } else {
            $select .= '<option value="">Seleccione proceso...</option>';
            foreach($procesos as $p){
                $select .= '<option value="'.$p->proceso_id.'">'.$p->proceso_nombre.'</option>';
            }
        }

        echo $select;

    }


    public function objetivos_por_riesgo($id_seccion)
    {
        $objetivos = $this->ajax->obtener_objetivos_por_riesgo($id_seccion);

        $select = '';

        if(count($objetivos) == 0){
            $select .= '<option value="">No hay registros asociados</option>';
        } else {
            $select .= '<option value="">Seleccione objetivo...</option>';
            foreach($objetivos as $p){
                $select .= '<option value="'.$p->objetivo_id.'">'.$p->objetivo_nombre.'</option>';
            }
        }

        echo $select;

    }


    public function datos_por_procesos($id_proceso)
    {
        $datos = $this->ajax->obtener_datos_por_procesos($id_proceso);

        $select = '';

        if(count($datos) == 0){
            $select .= '<option value="">No hay registros asociados</option>';
        } else {
            $select .= '<option value="">Seleccione dato...</option>';
            foreach($datos as $d){
                $select .= '<option value="'.$d->dato_id.'">'.$d->dato_nombre.'</option>';
            }
        }

        echo $select;

    }

    public function indicadores_por_procesos($id_proceso)
    {
        $indicadores = $this->ajax->obtener_indicadores_por_procesos($id_proceso);

        $select = '';

        if(count($indicadores) == 0){
            $select .= '<option value="">Proceso sin datos</option>';
        } else {
            $select .= '<option value="">Seleccione indicador...</option>';
            foreach($indicadores as $i){
                $select .= '<option value="'.$i->indicador_id.'">'.$i->indicador_codigo.'</option>';
            }
        }

        echo $select;

    }


    public function guardar_permiso()
    {
        $perfil_id = $this->input->post('perfil_id');
        $modulo_id = $this->input->post('modulo_id');
        $accion = $this->input->post('accion');

        if($accion == 1){ $accion = 'leer'; }
        if($accion == 2){ $accion = 'crear'; }
        if($accion == 3){ $accion = 'editar'; }
        if($accion == 4){ $accion = 'eliminar'; }
        if($accion == 5){ $accion = 'exportar'; }

        $permiso = $this->ajax->ver_permiso($perfil_id, $modulo_id, $accion);

        ($permiso == 1) ? $actualizacion = 0 : $actualizacion = 1;

        $data = array($accion => $actualizacion);

        $actualizar = $this->ajax->cambiar_permiso($perfil_id, $modulo_id, $data);
        query_logger();

    }


    public function documentos_por_seccion($id_seccion)
    {
        $documentos = $this->ajax->obtener_documentos_por_seccion($id_seccion);

        $select = '';

        if(count($documentos) == 0){
            $select .= '<option value="">Sin documentos</option>';
        } else {
            $select .= '<option value="">Seleccione Documento...</option>';
            foreach($documentos as $d){
                $select .= '<option value="'.$d->documento_id.'">'.$d->documento.'</option>';
            }
        }

        echo $select;

    }


    public function seccion_por_incidencia($id_incidencia)
    {
        $seccion = $this->ajax->obtener_seccion_por_incidencia($id_incidencia);

        $select = '';

        if(count($seccion) == 0){
            $select .= '<option value="">Sin Seccion</option>';
        } else {
            $select .= '<option value="">Seleccione Seccion...</option>';
            foreach($seccion as $s){
                $select .= '<option value="'.$s->seccion_id.'">'.$s->seccion.'</option>';
            }
        }

        echo $select;

    }

    public function proceso_por_incidencia($id_incidencia)
    {
        $proceso = $this->ajax->obtener_proceso_por_incidencia($id_incidencia);

        $select = '';

        if(count($proceso) == 0){
            $select .= '<option value="">Sin proceso</option>';
        } else {
            $select .= '<option value="">Seleccione Proceso...</option>';
            foreach($proceso as $p){
                $select .= '<option value="'.$p->proceso_id.'">'.$p->proceso_nombre.'</option>';
            }
        }

        echo $select;

    }



}
