function Login()
{
    var self = this;
    var formLogin = $("form#formLogin");
    var inputUsuario = $("input#inputLoginUsuario");
    var inputSenha = $("input#inputLoginSenha");
    var inputUsuarioImpedido = true;
    var inputSenhaImpedido = true;
    var buttonLogin = $('input#buttonLogin');
    
    function __construct()
    {
        attachEvents();
        triggerButtonLogin();
    }
    
    function attachEvents()
    {
        inputUsuario.change(function(){
            usuario = $(this).val();
            if (usuario == "" || usuario == " " || usuario == undefined) {
                $('#inputLoginUsuarioGroup').removeClass('has-success');
                $('#inputLoginUsuarioGroup').addClass('has-error');
                inputUsuarioImpedido = true;
                triggerButtonLogin();
            } else {
                $('#inputLoginUsuarioGroup').removeClass('has-error');
                $('#inputLoginUsuarioGroup').addClass('has-success');
                inputUsuarioImpedido = false;
                triggerButtonLogin();
            }
        });
        
        inputSenha.change(function(){
            senha = $(this).val();
            if (senha == "" || senha == " " || senha == undefined) {
                $('#inputLoginSenhaGroup').removeClass('has-success');
                $('#inputLoginSenhaGroup').addClass('has-error');
                inputSenhaImpedido = true;
                triggerButtonLogin();
            } else {
                $('#inputLoginSenhaGroup').removeClass('has-error');
                $('#inputLoginSenhaGroup').addClass('has-success');
                inputSenhaImpedido = false;
                triggerButtonLogin();
            }
        });
        
        buttonLogin.on("isBloqueado", function(event, usuarioImpedido, senhaImpedida){
            if(usuarioImpedido || senhaImpedida) {
                $(this).prop('disabled', true);
            } else {
                $(this).prop('disabled', false);
            }
        });
        
        formLogin.submit(function(){
        	$(inputUsuario).prop('readonly', true);
        	$(inputSenha).prop('readonly', true);
        	$(buttonLogin).prop('readonly', true);
        	return true;
        });
    }
    
    function triggerButtonLogin()
    {
        buttonLogin.trigger("isBloqueado", [inputUsuarioImpedido, inputSenhaImpedido]);
    }
    
    __construct();
}

$(document).ready(function(){
	new Login();
});
