<?

class ConfiguracaoSEI extends InfraConfiguracao  {
	
	private static $instance = null;

	public static function getInstance(){
		if (ConfiguracaoSEI::$instance == null) {
			ConfiguracaoSEI::$instance = new ConfiguracaoSEI();
		}
		return ConfiguracaoSEI::$instance;
	}
	
	public function getArrConfiguracoes(){
       
		return array(
			'SEI' => array(
				'URL' => getenv('HOST_URL').'/sei',
                'Producao' => false,
                'DigitosDocumento' => 7,
                'PermitirAcessoLocalPdf' => array('/opt/sei/temp/'),
                'NumLoginUsuarioExternoSemCaptcha' => 3,
                'TamSenhaUsuarioExterno' => 8,
                'DebugWebServices' => 1,
                'RepositorioArquivos' => '/var/sei/arquivos',
                'Modulos' => array(
					'PesquisaIntegracao' => 'pesquisa',
                    'MdWebServiceSigss' => '/pmsp/ws_complementar_sigss/',
					'MdPublicacoes' => '/pmsp/publicacoes/',
					'MdRotinaArquivos' => '/pmsp/rotina_arquivos/',
					'MdTimeout' => '/pmsp/timeout/',
					'MdConsultaUnificada' => '/pmsp/consulta_unificada/',
					'MdPeticionamento' => '/pmsp/peticionamento/',
					'MdConsultarProcesso' => '/pmsp/consultar_processo/',
					'MdCguWsComplementarIntegracao' => '/cgu/wscomplementar/',
					'MdSimularTaxa' => '/pmsp/simular_taxa/',
					'MdBlocoAssinatura' =>'/pmsp/bloco_assinatura/',					
					'MdSeiWSCustomizado' => '/pmsp/webservice_customizado/',
					'MdAlteracaoNivelAcesso' => '/pmsp/alterar_nivel_acesso/',
					'MdAnexarRecurso' => '/pmsp/anexar_recurso/',	
					'MdAlteracaoNivelAcessoDocumento' => '/pmsp/alterar_nivel_acesso_documentos/',
					'MdEpubli' => '/pmsp/epubli/',
                    'MdRotinaArquivosUpload' => '/pmsp/rotina_arquivos_upload/',
                    'MdExtracaoFormularioContratos' => '/pmsp/extracao_formulario_contratos/',
                    'MdNegocioPublico' => '/pmsp/negocio_publico/',
                    'MdCustomizacao' => '/pmsp/customizacoes/',
                ),
			),
			
			'SessaoSEI' => array(
				'SiglaOrgaoSistema' => 'PMSP',
				'SiglaSistema' => 'SEI',
				'PaginaLogin' => getenv('HOST_URL') . '/sip/modulos/pmsp/login/login.php',
				'SipWsdl' => getenv('HOST_URL') . '/sip/controlador_ws.php?servico=sip',
                'ChaveAcesso' => '7babf862b4dd481a7ff4381be2522b003b5920e130f0f046d1015def954468d8f7940a86',
                'https' => false,
			),

			'PaginaSEI' => array(
				'NomeSistema' => 'SEI',
				'NomeSistemaComplemento' => SEI_VERSAO,
				'LogoMenu' => '',
				'OrgaoTopoJanela' => 'N',
			),

			'BancoSEI' => array(
                //'Servidor' => '192.168.0.7',
                'Servidor' => 'PRODAMHOC115888',
                'Porta' => '1533',
                'Banco' => 'sei4',
                'Usuario' => 'felipe',
                'Senha' => 'Fi-152370',
                'Tipo' => 'SqlServer'
            ) , //MySql, SqlServer, Oracle ou PostgreSql

            'BancoPubnet' => array(
                //'Servidor' => '192.168.0.7',
                'Servidor' => 'PRODAMHOC115888',
                'Porta' => '1533',
                'Banco' => 'Radar_Pubnet20_Prodam_2021',
                'Usuario' => 'felipe',
                'Senha' => 'Fi-152370',
                'Tipo' => 'SqlServer'
            ) , //MySql, SqlServer, Oracle ou PostgreSql

			'CacheSEI' => array(
				'Servidor' => 'memcached',
				'Porta' => '11211',
				'Timeout' => 1,
				'Tempo' => 3600,					
			),

            'Federacao' => array(
                'Habilitado' => false,
                'NumSegundosAcaoRemota' => 10,  //Tempo m�ximo que um link de a��o do SEI Federa��o pode ser executado.
                'NumSegundosSincronizacao' => 300,  //Diferen�a m�xima em segundos entre os hor�rios das instala��es.
                'NumDiasTentativasReplicacao' => 3,  //Informa por quanto tempo o sistema tentar� replicar sinaliza��es em processos para outras instala��es do SEI Federa��o.
                'ReplicarAcessosOnline' => true,  //Sinaliza se as concess�es de acessos para �r-g�os de outras instala��es devem ser replicadas no mesmo instante. Se o valor for false ou se ocorrer um erro ent�o as replica��es ser�o tratadas pelo agendamento de replica��es.
                'NumMaxProtocolosConsulta' => 100,  //N�mero m�ximo de protocolos do processo que ser�o retornados quando outra institui��o consultar pelo SEI Federa-��o (acima deste valor ser� realizada pagina��o).
                'NumMaxAndamentosConsulta' => 100,  //N�mero m�ximo de andamentos do processo que ser�o retornados quando outra institui��o consultar pelo SEI Federa��o (acima deste valor ser� realizada pagina��o).
            ),           

            'XSS' => array(
                'NivelVerificacao' => 'N',
                'ProtocolosExcecoes' => null,
                'NivelBasico' => array(
                    'ValoresNaoPermitidos' => null,
                ),
                'NivelAvancado' => array(
                    'TagsPermitidas' => null,
					'TagsAtributosPermitidos' =>null,                    
                ),
            ),


            // 'Limites' => array(

                
            //     //N�vel 1 � afeto a Opera��es em geral
            //     'Nivel1TempoSeg' => 60,  //Esta chave define o Tempo m�ximo em segundos para execu��o do script.
            //     'Nivel1MemoriaMb' => 256,  //Esta chave define a Quantidade m�xima de mem�ria em Megabytes que o script pode utilizar.
            //     //N�vel 2 � afeto a Download de documentos, Estat�sticas, Gera��o de PDF, Migra��o de Unidade, Indexa��o Individual e Substitui��o de contatos
            //     'Nivel2TempoSeg' => 600,  //Esta chave define o Tempo m�ximo em segundos para execu��o do script.
            //     'Nivel2MemoriaMb' => 2048,  //Esta chave define a Quantidade m�xima de mem�ria em Megabytes que o script pode utilizar.
            //     //N�vel 3 � afeto a Scripts, Agendamentos, Indexa��o Massiva, Crit�rios de Controle Interno e Web Services
            //     'Nivel3TempoSeg' => 0,  //Esta chave define o Tempo m�ximo em segundos para execu��o do script. Este n�vel aceita o valor ?0? para indicar sem limite de tempo.
            //     'Nivel3MemoriaMb' => 4096,  //Esta chave define a Quantidade m�xima de mem�ria em Megabytes que o script pode utilizar. Este n�vel aceita o valor ?-1? para indicar sem limite de mem�ria.
            // ),

            'RH' => array(
                'CargoFuncao' => '',  //Endere�o para o servi�o de recupera��o de Cargos/Fun��es para assinatura de documentos (opcional).
            ),

			'Solr' => array(
				'Servidor' => 'http://solr:8983/solr',
				'CoreProtocolos' => 'sei-protocolos',
				'CoreBasesConhecimento' => 'sei-bases-conhecimento',
				'CorePublicacoes' => 'sei-publicacoes',
				'TempoCommitProtocolos' => 300,
				'TempoCommitBasesConhecimento' => 60,
				'TempoCommitPublicacoes' => 60,					
			),				
			
			'JODConverter' => array(
				'Servidor' => 'http://jod/converter/service'
			),
			
			'HostWebService' => array(
				'Sip' => array('*'), //Refer?ncias (IP e nome na rede) de todas as m?quinas que executam o SIP.
				'Publicacao' => array('*'), //Refer?ncias (IP e nome na rede) das m?quinas de ve?culos de publica??o externos cadastrados no SEI.
				'Ouvidoria' => array('*'), //Refer?ncias (IP e nome na rede) da m?quina que hospeda o formul?rio de Ouvidoria personalizado. Se utilizar o formul?rio padr?o do SEI, ent?o configurar com as m?quinas dos n�s de aplica??o do SEI.
			),

            'InfraMail' => array(
                'Tipo' => '2', //1 = sendmail (neste caso n�o � necess�rio configurar os atributos abaixo), 2 = SMTP
                'Servidor' => 'smtp',
                'Porta' => '1025',
                'Codificacao' => '8bit', //8bit, 7bit, binary, base64, quoted-printable
                'Autenticar' => false, //se true ent�o informar Usuario e Senha
                'Usuario' => '',
                'Senha' => '',
                'Seguranca' => '', //TLS, SSL ou vazio
                'MaxDestinatarios' => 25, //numero maximo de destinatarios por mensagem
                'MaxTamAnexosMb' => 15, //tamanho maximo dos anexos em Mb por mensagem
                'Protegido' => '', //campo usado em desenvolvimento, se tiver um email preenchido entao todos os emails enviados terao o destinatario ignorado e substitu�do por este valor (evita envio incorreto de email)
                /*  Abaixo chave opcional desativada com exemplo de preenchimento
                'Dominios' => array(	// Opcional. Permite especificar o conjunto de atributos acima individualmente para cada dom�nio de conta remetente. Se n�o existir um dom�nio mapeado ent�o utilizar� os atributos gerais da chave InfraMail.
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
