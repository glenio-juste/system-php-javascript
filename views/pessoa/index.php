<form id="frmCadPessoa" name="frmCadPessoa" method="post" action="" role="form" class="needs-validation" novalidate>
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required placeholder="Informe seu nome">
    <div class="invalid-feedback">Nome obrigatório.</div>
  </div>
  <div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" required placeholder="Informe seu CPF">
    <div class="invalid-feedback">CPF obrigatório.</div>
  </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Informe seu e-mail">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" required name="status">
      <option value="ATIVO">Ativo</option>
      <option value="INATIVO">Inativo</option>
    </select>
    <div class="invalid-feedback">Selecione uma opção.</div>
  </div>
  <div class="form-group">
    <label for="observacao">Observação</label>
    <textarea class="form-control" id="observacao" name="observacao" rows="3"></textarea>
  </div>
  <div>
    <button id="btnSave" class="btn btn-success">Gravar</button>
    <button id="btnEditar" class="btn btn-primary">Editar</button>
    <button id="btnCancelar" class="btn btn btn-secondary">Cancelar</button>
  </div>
  
</form>
<table style="margin-top: 18px;"
  id="tablePessoa"
  data-search="true"
  data-click-to-select="true"
  data-pagination="true"
  data-id-field="id"
  data-page-list="[ 10, 25, 50, 100, all]"
  data-url="pessoa/findAll">
</table>


<div id="myModal" class="modal" tabindex="-1"></div>