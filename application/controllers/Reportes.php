<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('Reportes_Model', 'reporte');
    }


    public function documentos_secciones()
    {
        $data['areas'] = $this->reporte->areas();
        $data['secciones'] = $this->reporte->secciones();
        $this->load->view('layout/header');
        $this->load->view('reportes/documentos_secciones', $data);
        $this->load->view('layout/footer');
    }


    public function buscar_documentos()
    {
        $area = $this->input->post('area');
        $seccion = $this->input->post('seccion');

        $documentos = $this->reporte->documentos_filtrados($area, $seccion);

        $html = '
            <table class="table table-bordered table-striped table-hover table-condensed">
                <thead>
                    <th>Documento</th>
                    <th>Responsable Publicación</th>
                    <th>Responsable Preparación</th>
                    <th>Fecha Publicación</th>
                    <th>Versión</th>
                </thead>
                <tbody>
        ';

        if(count($documentos) == 0){
                $html .= '
                    <tr class="text-center" align="center">
                        <td colspan="5">No hay documentos asociados a esta sección</td>
                    </tr>
                ';
        } else {
            foreach ($documentos as $documento){
                $html .= '
                    <tr>
                        <td>'.$documento->documento.'</td>
                        <td>'.responsable($documento->responsable_preparar).'</td>
                        <td>'.responsable($documento->responsable_publicar).'</td>
                        <td>'.$documento->fecha_publicacion.'</td>
                        <td>'.$documento->version.'</td>
                    </tr>
                ';
            }
        }

        $html .= '</tbody></table>';

        echo json_encode(array(
            'estado' => 1,
            'html' => $html
        ));

    }


}
