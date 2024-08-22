<?

class ConfiguracaoSip extends InfraConfiguracao  {
	
	private static $instance = null;
	
	public static function getInstance(){
		if (ConfiguracaoSip::$instance == null) {
			ConfiguracaoSip::$instance = new ConfiguracaoSip();
		}
		return ConfiguracaoSip::$instance;
	}
	
	public function getArrConfiguracoes(){
		return array(
            'Sip' => array(
                'URL' => getenv('HOST_URL').'/sip',
                'Producao' => false,
                'NumLoginSemCaptcha' => 3,
                'TempoLimiteValidacaoLogin' => 60,
                'Modulos' => array(
                    'MdWebServiceSigss' => '/pmsp/ws_complementar_sigss/',
		    'MdAdministradorLocal' => '/pmsp/administrador_local/',
		    'MdLogin' => '/pmsp/login/'
                ),
            ),

			'PaginaSip' => array(
				'NomeSistema' => 'SIP',
				'NomeSistemaComplemento' => '',
			),

			'SessaoSip' => array(
				'SiglaOrgaoSistema' => 'PMSP',
				'SiglaSistema' => 'SIP',
				'PaginaLogin' => getenv('SEI_HOST_URL') . '/sip/login.php',
				'SipWsdl' => getenv('HOST_URL') . '/sip/controlador_ws.php?servico=sip',
                'ChaveAcesso' => 'd27791b89a29b568eb0c3e39b4ab13ea89afb4f25a99384c56920e14b23b8f061cab575c',
                'https' => false,
			),
			
			'BancoSip' => array(
                //'Servidor' => '192.168.0.7',
                'Servidor' => 'PRODAMHOC115888',
                'Porta' => '1533',
                'Banco' => 'sip4',
                'Usuario' => 'felipe',
                'Senha' => 'Fi-152370',
                'Tipo' => 'SqlServer'
            ) , 	
			
			
			'CacheSip' => array(
				'Servidor' => 'memcached',			
				'Porta' => '11211',
				'Timeout' => 2,
				'Tempo' => 3600,				
			),


            'InfraMail' => array(
                'Tipo' => '2', //1 = sendmail (neste caso n?o ? necess?rio configurar os atributos abaixo), 2 = SMTP
                'Servidor' => 'smtp',
                'Porta' => '1025',
                'Codificacao' => '8bit', //8bit, 7bit, binary, base64, quoted-printable
                'Autenticar' => false, //se true ent?o informar Usuario e Senha
                'Usuario' => '',
                'Senha' => '',
                'Seguranca' => '', //TLS, SSL ou vazio
                'MaxDestinatarios' => 25, //numero maximo de destinatarios por mensagem
                'MaxTamAnexosMb' => 15, //tamanho maximo dos anexos em Mb por mensagem
                'Protegido' => '', //campo usado em desenvolvimento, se tiver um email preenchido ent�o todos os emails enviados ter�o o destinatario ignorado e substitu�do por este valor (evita envio incorreto de email)
                /*  Abaixo chave opcional desativada com exemplo de preenchimento
                'Dominios' => array(	// Opcional. Permite especificar o conjunto de atributos acima individualmente para cada dom�nio de conta remetente. Se n?o existir um dom?nio mapeado ent�o utilizar� os atributos gerais da chave InfraMail.
                    'abc.jus.br' => array(
                        'Tipo' => '2',
                        'Servidor' => '10.1.3.12',
                        'Porta' => '25',
                        'Codificacao' => '8bit',
                        'Autenticar' => false,
                        'Usuario' => '',
                        'Senha' => '',
                        'Seguranca' => 'TLS',
                        'MaxDestinatarios' => 25,
                        'MaxTamAnexosMb' => 15,
                        'Protegido' => '',
                        ),
                    ),
                    */
            ),
        );
    }
}
?>
