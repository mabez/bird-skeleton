function AdminProduto()
{
    var self = this;	
    var formProduto = $("form#formProduto");
    var inputImagem = $("input#inputProdutoImagem");
    var inputTitulo = $("input#inputProdutoTitulo");
    var inputDescricao = $("input#inputProdutoDescricao");
    var inputPreco = $("input#inputProdutoPreco");
    var tituloImpedido = true;
    var precoImpedido = true;
    var descricaoImpedido = true;
    var buttonSalvar = $('input#buttonProdutoSalvar');
    
    function __construct()
    {
    	if (!empty(inputTitulo.val())) {
    		tituloImpedido = false;
    	} 
    	
    	if (!empty(inputDescricao.val())) {
    		descricaoImpedido = false;
    	} 
    	
    	if (!empty(inputPreco.val())) {
    		precoImpedido = false;
    	}

    	mascararPreco(inputPreco);

        attachEvents();
        triggerButtonSalvar();
    }
    
    function attachEvents()
    {
    	inputTitulo.change(function(){
            titulo = $(this).val();
            if (empty(titulo)) {
                $('#inputProdutoTituloGroup').removeClass('has-success');
                $('#inputProdutoTituloGroup').addClass('has-error');
                tituloImpedido = true;
                triggerButtonSalvar();
            } else {
                $('#inputProdutoTituloGroup').removeClass('has-error');
                $('#inputProdutoTituloGroup').addClass('has-success');
                tituloImpedido = false;
                triggerButtonSalvar();
            }
        });
        
    	inputDescricao.change(function(){
            descricao = $(this).val();
            if (empty(descricao)) {
                $('#inputProdutoDescricaoGroup').removeClass('has-success');
                $('#inputProdutoDescricaoGroup').addClass('has-error');
                descricaoImpedido = true;
                triggerButtonSalvar();
            } else {
                $('#inputProdutoDescricaoGroup').removeClass('has-error');
                $('#inputProdutoDescricaoGroup').addClass('has-success');
                descricaoImpedido = false;
                triggerButtonSalvar();
            }
        });
        
    	inputImagem.change(function(){
            $('#inputProdutoImagemGroup').removeClass('has-success');
        });
        
    	inputPreco.change(function(){
            preco = $(this).val();
            if (empty(preco)) {
                $('#inputProdutoPrecoGroup').removeClass('has-success');
                $('#inputProdutoPrecoGroup').addClass('has-error');
                precoImpedido = true;
                triggerButtonSalvar();
            } else {
                $('#inputProdutoPrecoGroup').removeClass('has-error');
                $('#inputProdutoPrecoGroup').addClass('has-success');
                precoImpedido = false;
                triggerButtonSalvar();
            }
        });
        
        buttonSalvar.on("isBloqueado", function(event, tituloImpedido, descricaoImpedido, precoImpedido){
            if(tituloImpedido || descricaoImpedido || precoImpedido) {
                $(this).prop('disabled', true);
            } else {
                $(this).prop('disabled', false);
            }
        });
        
        formProduto.submit(function(){
        	$(inputTitulo).prop('readonly', true);
        	$(inputImagem).prop('readonly', true);
        	$(inputDescricao).prop('readonly', true);
        	$(inputPreco).prop('readonly', true);
        	$(buttonSalvar).prop('readonly', true);
        	var preco = ($(inputPreco).unmask()/100);
        	$(inputPreco).val(preco);
        	return true;
        });
    }
    
    function triggerButtonSalvar()
    {
    	buttonSalvar.trigger("isBloqueado", [tituloImpedido, descricaoImpedido, precoImpedido]);
    }
    
    function empty(valor)
    {
    	return (valor == "" || valor == " " || valor == undefined);
    }
    
    function mascararPreco(campo)
    {
	    preco = $(campo).val();
	    $(campo).val(preco*100);
	    
		$(campo).priceFormat({
		    prefix: '',
		    centsSeparator: ',',
		    thousandsSeparator: '.'
		});
    }

    __construct();
}

$(document).ready(function(){
	new AdminProduto();
});