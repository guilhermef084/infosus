<!-- modal relatorio específico medico -->
<div class="modal fade" id="rlt_e_medico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-lg" id="exampleModalLabel">Relatório Específico - Médico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="post" class="needs-validation" name="form" enctype="multipart/form-data" novalidate>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" name="codHospitalLogado" class="form-control" value="<?php echo $codHospitalLogado; ?>"/>
                            </div>
                        </div>
                    </div>                                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit"class="btn btn-success" name="gerarRelatorio">
                            <i class="fas fa-print"></i>
                            Gerar
                        </button>
                    </div>
                </form>
            </div>
		  </div>
    </div>
</div>