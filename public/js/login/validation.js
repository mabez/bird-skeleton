function Validation()
{
    var self = this;
    var inputUsuario = $("input#inputUsuario");
    var inputSenha = $("input#inputSenha");
    var inputUsuarioImpedido = true;
    var inputSenhaImpedido = true;
    var buttonLogin = $('button#buttonLogin');
    
    function __construct()
    {
        attachEvents();
    }
    
    function attachEvents()
    {
        inputUsuario.change(function(){
            usuario = $(this).val();
            if (usuario == "" || usuario == " " || usuario == undefined) {
                $('#inputUsuarioGroup').removeClass('has-success');
                $('#inputUsuarioGroup').addClass('has-error');
                inputUsuarioImpedido = true;
                triggerButtonLogin();
            } else {
                $('#inputUsuarioGroup').removeClass('has-error');
                $('#inputUsuarioGroup').addClass('has-success');
                inputUsuarioImpedido = false;
                triggerButtonLogin();
            }
        });
        
        inputSenha.change(function(){
            senha = $(this).val();
            if (senha == "" || senha == " " || senha == undefined) {
                $('#inputSenhaGroup').removeClass('has-success');
                $('#inputSenhaGroup').addClass('has-error');
                inputSenhaImpedido = true;
                triggerButtonLogin();
            } else {
                $('#inputSenhaGroup').removeClass('has-error');
                $('#inputSenhaGroup').addClass('has-success');
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
    }
    
    function triggerButtonLogin()
    {
        buttonLogin.trigger("isBloqueado", [inputUsuarioImpedido, inputSenhaImpedido]);
    }
    
    __construct();
}
new Validation();