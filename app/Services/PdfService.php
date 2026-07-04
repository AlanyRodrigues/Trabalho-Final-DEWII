<?php

namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{
    protected Dompdf $dompdf;

    public function __construct()
    {
        $options = new Options();

        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->setDefaultFont('DejaVu Sans');

        $this->dompdf = new Dompdf($options);
    }

    /**
     * Gera o PDF a partir de uma view.
     *
     * @param string $view Nome da view (ex.: tickets/pdf)
     * @param array $data Dados enviados para a view
     * @param string $fileName Nome do arquivo PDF
     * @param bool $download true = baixa o arquivo | false = abre no navegador
     */
    
    public function generate(
        string $view,
        array $data,
        string $fileName = 'documento.pdf',
        bool $download = true
    ) {
        $html = view($view, $data);

        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4', 'portrait');

        $this->dompdf->render();

        return $this->dompdf->stream($fileName, [
            'Attachment' => $download
        ]);
    }
}