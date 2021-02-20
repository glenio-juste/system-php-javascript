$(document).ready(function(){

	const table = $('#tablePessoa');
	const btnEditar = $("#btnEditar");
	const btnSalvar = $("#btnSave");
	var id;

	init();
	
	/* Evento para adicionar um novo item via requisição post
	 * O formulario e convertido em um objeto json e enviado no corpo da requisição
	 * para a classe controller para fazendo a chamado da funcao save
	 */
    $("#btnSave").click(function(event){
		validationForm(event);

		$.post("pessoa/save/",$("#frmCadPessoa").serialize(),function(data, status){
			alert(data);
			

		});

	});


	/* Evento para editar um  item via requisição post
	 * O formulario e convertido em um objeto json e enviado no corpo da requisição
	 * É adicionado um parametro na URL passando o id para o controller
	 * fazendo a chamada da funcao updae
	 */
	$("#btnEditar").click(function(event){ 
		validationForm(event);

		$.post(`pessoa/update?id=${id}`, $("#frmCadPessoa").serialize(),function(data, status){
			alert(data);
	
		});

	});

	/* Evento para limpar o formulário */
	$("#btnCancelar").click(function(){
		$('#frmCadPessoa')[0].reset();

	});

	/* Funcao de inicializacao  */
	function init(){
		id=null;
		btnEditar.hide();
		initTable();

	}


	/* Funcao para deletar um item */
	function deleteItem(){
		
		$.post("pessoa/delete/",{id: id },function(data, status){
			//console.log(`status: ${status}`);
			//console.log(`data: ${data}`);
		});
	}

	/*  Outra forma de popular os itens na tabela via requisição http*/
	function findAll(){

		$.get('pessoa/findAll/', function(data, status) {
			
		  data=$.parseJSON(data);

		  console.log(data);

		  table.bootstrapTable({data: data});
			
		});
		
	}


	/* Funcao responsavel por validar os campos do formulário */
	function validationForm(event) {
		
		let forms = document.getElementsByClassName('needs-validation');

		Array.prototype.filter.call(forms, function(form) {

			if (form.checkValidity() === false) {
				
			event.preventDefault();
			event.stopPropagation();

			form.classList.add('was-validated');
				
			}else {
				form.classList.remove('was-validated');
			}


		});

	}


	/* Funcao responsavel por adicionar booes de acao na tabela */
	function operateFormatter(value, row, index) {
		return [
		  '<a class="edit" href="javascript:void(0)" title="Like">',
		  '<i class="fas fa-edit"></i>',
		  '</a>  ',
		  '<a class="remove" href="javascript:void(0)" title="Remove">',
		  '<i class="fas fa-trash"></i>',
		  '</a>'
		].join('')
	}

	
	/* Funcao de inicializacao da tabela */
	function initTable() {
		window.operateEvents = {
			'click .edit': function (e, value, row, index) {
			  id = row.id;
			  $("#nome").val(row.nome);
			  $("#cpf").val(row.cpf);
			  $("#email").val(row.email);
			  $("#status").val(row.status).change();
			  $("#observacao").val(row.observacao);
			  btnEditar.show();
			  btnSalvar.hide();
			},
			'click .remove': function (e, value, row, index) {
				if (confirm("Deseja remover o item selecionado?")) {
					id = row.id;
					table.bootstrapTable('remove', {
						field: 'id',
						values: [row.id]
					})
					deleteItem();
					
				  }
			}
		}
		
		table.bootstrapTable('destroy').bootstrapTable({
		  locale: 'pt_BR',
		  columns: [
			[{
				field: 'id',
				visible: false,
				title: 'ID'
			  },
				{
				field: 'nome',
				title: 'Nome',
				sortable: true
			  }, {
				field: 'cpf',
				title: 'CPF'
			  }, {
				field: 'email',
				title: 'E-mail'
			  },
			  {
				field: 'status',
				title: 'Status'
			  },
			  {
				field: 'observacao',
				title: 'Observação'
			  },
			  {
				field: 'operate',
				title: 'Acão',
				align: 'center',
				clickToSelect: false,
				events: window.operateEvents,
				formatter: operateFormatter
			  }]
		  ]
		});

	}

	

});