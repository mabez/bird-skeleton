function AdminSite()
{
    var self = this;	
    var formSite = $("form#formSite");
    var inputLogo = $("input#inputSiteLogo");
    var inputNome = $("input#inputSiteNome");
    var nomeImpedido = true;
    var inputIntro = $("input#inputSiteIntro");
    var inputCopyright = $("input#inputSiteCopyright");
    var copyrightImpedido = true;
    var buttonSalvar = $('input#buttonSiteSalvar');
    
    function __construct()
    {
    	if (!empty(inputNome.val())) {
    		nomeImpedido = false;
    	} 
    	
    	if (!empty(inputCopyright.val())) {
    		copyrightImpedido = false;
    	} 
    	
        attachEvents();
        triggerButtonSalvar();
    }
    
    function attachEvents()
    {
        inputNome.change(function(){
            nome = $(this).val();
            if (empty(nome)) {
                $('#inputSiteNomeGroup').removeClass('has-success');
                $('#inputSiteNomeGroup').addClass('has-error');
                nomeImpedido = true;
                triggerButtonSalvar();
            } else {
                $('#inputSiteNomeGroup').removeClass('has-error');
                $('#inputSiteNomeGroup').addClass('has-success');
                nomeImpedido = false;
                triggerButtonSalvar();
            }
        });
        
        inputCopyright.change(function(){
            copyright = $(this).val();
            if (empty(copyright)) {
                $('#inputSiteCopyrightGroup').removeClass('has-success');
                $('#inputSiteCopyrightGroup').addClass('has-error');
                copyrightImpedido = true;
                triggerButtonSalvar();
            } else {
                $('#inputSiteCopyrightGroup').removeClass('has-error');
                $('#inputSiteCopyrightGroup').addClass('has-success');
                copyrightImpedido = false;
                triggerButtonSalvar();
            }
        });
        
        inputIntro.change(function() {
        	$('#inputSiteIntroGroup').addClass('has-success');
        });
        
        inputLogo.change(function() {
        	$('#inputSiteLogoGroup').addClass('has-success');
        });
        
        buttonSalvar.on("isBloqueado", function(event, nomeImpedido, copyrightImpedido){
            if(nomeImpedido || copyrightImpedido) {
                $(this).prop('disabled', true);
            } else {
                $(this).prop('disabled', false);
            }
        });
        
        formSite.submit(function(){
        	$(inputLogo).prop('readonly', true);
        	$(inputNome).prop('readonly', true);
        	$(inputIntro).prop('readonly', true);
        	$(inputCopyright).prop('readonly', true);
        	$(buttonSalvar).prop('readonly', true);
        	return true;
        });
    }
    
    function triggerButtonSalvar()
    {
    	buttonSalvar.trigger("isBloqueado", [nomeImpedido, copyrightImpedido]);
    }
    
    function empty(valor)
    {
    	return (valor == "" || valor == " " || valor == undefined);
    }
    
    __construct();
}

$(document).ready(function(){
	new AdminSite();
});
