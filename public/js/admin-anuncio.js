function AdminAnuncio()
{
    var self = this;	
    var formAnuncio = $("form#formAnuncio");
    var inputImagem = $("input#inputAnuncioImagem");
    var inputTitulo = $("input#inputAnuncioTitulo");
    var inputDescricao = $("input#inputAnuncioDescricao");
    var inputPreco = $("input#inputAnuncioPreco");
    var tituloImpedido = true;
    var precoImpedido = true;
    var descricaoImpedido = true;
    var buttonSalvar = $('input#buttonAnuncioSalvar');
    
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
                $('#inputAnuncioTituloGroup').removeClass('has-success');
                $('#inputAnuncioTituloGroup').addClass('has-error');
                tituloImpedido = true;
                triggerButtonSalvar();
            } else {
                $('#inputAnuncioTituloGroup').removeClass('has-error');
                $('#inputAnuncioTituloGroup').addClass('has-success');
                tituloImpedido = false;
                triggerButtonSalvar();
            }
        });
        
    	inputDescricao.change(function(){
            descricao = $(this).val();
            if (empty(descricao)) {
                $('#inputAnuncioDescricaoGroup').removeClass('has-success');
                $('#inputAnuncioDescricaoGroup').addClass('has-error');
                descricaoImpedido = true;
                triggerButtonSalvar();
            } else {
                $('#inputAnuncioDescricaoGroup').removeClass('has-error');
                $('#inputAnuncioDescricaoGroup').addClass('has-success');
                descricaoImpedido = false;
                triggerButtonSalvar();
            }
        });
        
    	inputImagem.change(function(){
            $('#inputAnuncioImagemGroup').removeClass('has-success');
        });
        
    	inputPreco.change(function(){
            preco = $(this).val();
            if (empty(preco)) {
                $('#inputAnuncioPrecoGroup').removeClass('has-success');
                $('#inputAnuncioPrecoGroup').addClass('has-error');
                precoImpedido = true;
                triggerButtonSalvar();
            } else {
                $('#inputAnuncioPrecoGroup').removeClass('has-error');
                $('#inputAnuncioPrecoGroup').addClass('has-success');
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
        
        formAnuncio.submit(function(){
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
	new AdminAnuncio();
});