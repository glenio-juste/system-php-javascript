<form id="frmCadCidade" name="frmCadCidade" method="post" action="" role="form" class="needs-validation" novalidate>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Informe a cidade">
        <div class="invalid-feedback">Nome obrigatório.</div>
    </div>

    <div class="form-group">
        <label for="uf">Estado</label>
        <input type="text" class="form-control" id="uf" name="uf" required placeholder="Informe o estado">
        <div class="invalid-feedback">Estado obrigatório.</div>
    </div>

    <div class="form-group">
        <label for="observacao">Observação</label>
        <textarea class="form-control" id="observacao" name="observacao" rows="2"></textarea>
    </div>

    <div>
        <button id="btnSave" class="btn btn-success">Gravar</button>
        <button id="btnEditar" class="btn btn-primary">Editar</button>
        <button id="btnCancelar" class="btn btn btn-secondary">Cancelar</button>
    </div>

</form>

<table style="margin-top: 18px;" 
    id="tableCidade" 
    data-search="true"
    data-show-refresh="true"
    data-show-export="true"
    data-click-to-select="true"     
    data-filter-control="true"
    data-pagination="true" 
    data-id-field="id" 
    data-page-list="[ 10, 25, 50, 100, all]" 
    data-url="cidade/findAll">
</table>
