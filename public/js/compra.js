function Compra()
{
    var self = this;
    var formCompra = $("form#formCompra");
    var inputProdutoPreco = $("input#inputProdutoPreco");
    var inputQuantidade = $("input#inputCompraQuantidade");
    var inputValor = $("input#inputCompraValor");
    
    function __construct()
    {
        attachEvents();
    }
    
    function attachEvents()
    {
        inputQuantidade.change(function(){
        	var preco = $(inputProdutoPreco).val();
        	var quantidade = inputQuantidade.val();
        	var valor = preco * quantidade;
        	mascararPreco($(inputValor).val(valor));
        });
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
		    prefix: 'R$',
		    centsSeparator: ',',
		    thousandsSeparator: '.'
		});
    }
    
    __construct();
}

$(document).ready(function(){
	new Compra();
});
