/* $(document).ready ()

Uma página não pode ser manipulada com segurança até que o documento 
esteja "pronto". jQuery detecta esse estado de prontidão para você. 
O código incluído $( document ).ready() somente será executado quando 
a página Document Object Model (DOM) estiver pronta para a execução do código JavaScript */

/* Fonte: https://learn.jquery.com/using-jquery-core/document-ready/ */

$(document).ready(function () {

    const table = $('#tableCidade');
    const btnEditar = $("#btnEditar");
    const btnSalvar = $("#btnSave");
    var id;

    init();


    /* Evento para adicionar um novo item via requisição post
     * O formulario e convertido em um objeto json e enviado no corpo da requisição
     * para a classe controller para fazendo a chamado da funcao save
     */
    $("#btnSave").click(function (event) {
        validationForm(event);

        $.post("cidade/save/", $("#frmCadCidade").serialize(), function (data, status) {
            alert(data);


        });

    });


    /* Evento para editar um  item via requisição post
     * O formulario e convertido em um objeto json e enviado no corpo da requisição
     * É adicionado um parametro na URL passando o id para o controller
     * fazendo a chamada da funcao updae
     */
    $("#btnEditar").click(function (event) {
        validationForm(event);

        $.post(`cidade/update?id=${id}`, $("#frmCadCidade").serialize(), function (data, status) {
            alert(data);

        });

    });


    /* Funcao para deletar um item */
    function deleteItem() {

        $.post("cidade/delete/", { id: id }, function (data, status) {
            console.log(`status: ${status}`);
            console.log(`data: ${data}`);
        });
    }


    /* Evento para limpar o formulário */
    $("#btnCancelar").click(function () {
        $('#frmCadCidade')[0].reset();

    });


    // função de inicialização
    function init() {
        id = null;
        btnEditar.hide();
        initTable();
    }

    /*  Outra forma de popular os itens na tabela via requisição http*/
    function findAll() {

        /* $.get = Carrega dados do servidor usando uma solicitação HTTP GET */
        /* Fonte: https://api.jquery.com/jquery.get/ */
        $.get('cidade/findAll', function (data, status) {

            /* $.parseJSON = pega uma string JSON bem formada e retorna o valor JavaScript resultante
            Retorna: String ou Number ou Object ou Array ou Boolean */
            data = $.parseJSON(data);

            console.log(data);

            // esse table. é o const table = $('#tableCidade');
            table.bootstrapTable({ data: data });
        });
    }


    /* Funcao responsavel por validar os campos do formulário */
    function validationForm(event) {

        let forms = document.getElementsByClassName('needs-validation');

        Array.prototype.filter.call(forms, function (form) {

            if (form.checkValidity() === false) {

                event.preventDefault();
                event.stopPropagation();

                form.classList.add('was-validated');

            } else {
                form.classList.remove('was-validated');
            }


        });

    }


    /* tem na documentação https://examples.bootstrap-table.com/index.html#welcome.html#view-source */
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




    /* Função de inicialização da tabela cidade */
    function initTable() {
        window.operateEvents = {
            'click .edit': function (e, value, row, index) {
                id = row.id;
                $("#nome").val(row.nome);
                $("#uf").val(row.uf);
                $("#observacao").val(row.observacao);
                btnEditar.show();
                btnSalvar.hide();
            },
            'click .remove': function (e, value, row, index) {
                if (confirm("Deseja remover o item selecionado " + row.nome + "?")) {
                    id = row.id;
                    table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    })
                    deleteItem();

                }
            }
        }

        /* Filter Control -> https://examples.bootstrap-table.com/index.html#extensions/filter-control.html */

        table.bootstrapTable('destroy').bootstrapTable({
            locale: 'pt_BR',
            //exportTypes: ['excel', 'csv'],
            //exportTypes: ['csv'],
            columns: [
                [{
                    field: 'id',
                    visible: false,
                    title: 'ID'
                },
                {
                    field: 'nome',
                    title: 'Nome',
                    sortable: true,
                    /* filterControl: 'select',
                    filterControlPlaceholder: 'Todos' */
                }, {
                    field: 'uf',
                    title: 'Estado',
                    /* filterControl: 'select',
                    filterControlPlaceholder: 'Todos' */
                }, {
                    field: 'observacao',
                    title: 'Observação',
                    /* filterControl: 'input' */                    
                }, {
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