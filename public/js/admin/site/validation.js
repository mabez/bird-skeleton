function AdminSiteValidation()
{
    var self = this;	
    var inputLogo = $("input#inputSiteLogo");
    var inputNome = $("input#inputSiteNome");
    var nomeImpedido = true;
    var inputIntro = $("input#inputSiteIntro");
    var inputCopyright = $("input#inputSiteCopyright");
    var copyrightImpedido = true;
    var buttonSalvar = $('button#buttonSiteSalvar');
    
    function __construct()
    {
    	if (!empty(inputNome.val())) {
    		nomeImpedido = false;
    	} 
    	
    	if (!empty(inputCopyright.val())) {
    		copyrightImpedido = false;
    	} 
    	
        attachEvents();
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
        	intro = $(this).val();
        	$('#inputSiteIntroGroup').addClass('has-success');
        });
        
        inputLogo.change(function() {
        	logo = $(this).val();
        	$('#inputSiteLogoGroup').addClass('has-success');
        });
        
        buttonSalvar.on("isBloqueado", function(event, nomeImpedido, copyrightImpedido){
            if(nomeImpedido || copyrightImpedido) {
                $(this).prop('disabled', true);
            } else {
                $(this).prop('disabled', false);
            }
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
new AdminSiteValidation();