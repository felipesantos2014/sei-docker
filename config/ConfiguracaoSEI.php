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
                'NumSegundosAcaoRemota' => 10,  //Tempo máximo que um link de ação do SEI Federação pode ser executado.
                'NumSegundosSincronizacao' => 300,  //Diferença máxima em segundos entre os horários das instalações.
                'NumDiasTentativasReplicacao' => 3,  //Informa por quanto tempo o sistema tentará replicar sinalizações em processos para outras instalações do SEI Federação.
                'ReplicarAcessosOnline' => true,  //Sinaliza se as concessões de acessos para ór-gãos de outras instalações devem ser replicadas no mesmo instante. Se o valor for false ou se ocorrer um erro então as replicações serão tratadas pelo agendamento de replicações.
                'NumMaxProtocolosConsulta' => 100,  //Número máximo de protocolos do processo que serão retornados quando outra instituição consultar pelo SEI Federa-ção (acima deste valor será realizada paginação).
                'NumMaxAndamentosConsulta' => 100,  //Número máximo de andamentos do processo que serão retornados quando outra instituição consultar pelo SEI Federação (acima deste valor será realizada paginação).
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

                
            //     //Nível 1 é afeto a Operações em geral
            //     'Nivel1TempoSeg' => 60,  //Esta chave define o Tempo máximo em segundos para execução do script.
            //     'Nivel1MemoriaMb' => 256,  //Esta chave define a Quantidade máxima de memória em Megabytes que o script pode utilizar.
            //     //Nível 2 é afeto a Download de documentos, Estatísticas, Geração de PDF, Migração de Unidade, Indexação Individual e Substituição de contatos
            //     'Nivel2TempoSeg' => 600,  //Esta chave define o Tempo máximo em segundos para execução do script.
            //     'Nivel2MemoriaMb' => 2048,  //Esta chave define a Quantidade máxima de memória em Megabytes que o script pode utilizar.
            //     //Nível 3 é afeto a Scripts, Agendamentos, Indexação Massiva, Critérios de Controle Interno e Web Services
            //     'Nivel3TempoSeg' => 0,  //Esta chave define o Tempo máximo em segundos para execução do script. Este nível aceita o valor ?0? para indicar sem limite de tempo.
            //     'Nivel3MemoriaMb' => 4096,  //Esta chave define a Quantidade máxima de memória em Megabytes que o script pode utilizar. Este nível aceita o valor ?-1? para indicar sem limite de memória.
            // ),

            'RH' => array(
                'CargoFuncao' => '',  //Endereço para o serviço de recuperação de Cargos/Funções para assinatura de documentos (opcional).
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
				'Ouvidoria' => array('*'), //Refer?ncias (IP e nome na rede) da m?quina que hospeda o formul?rio de Ouvidoria personalizado. Se utilizar o formul?rio padr?o do SEI, ent?o configurar com as m?quinas dos nós de aplica??o do SEI.
			),

            'InfraMail' => array(
                'Tipo' => '2', //1 = sendmail (neste caso não é necessário configurar os atributos abaixo), 2 = SMTP
                'Servidor' => 'smtp',
                'Porta' => '1025',
                'Codificacao' => '8bit', //8bit, 7bit, binary, base64, quoted-printable
                'Autenticar' => false, //se true então informar Usuario e Senha
                'Usuario' => '',
                'Senha' => '',
                'Seguranca' => '', //TLS, SSL ou vazio
                'MaxDestinatarios' => 25, //numero maximo de destinatarios por mensagem
                'MaxTamAnexosMb' => 15, //tamanho maximo dos anexos em Mb por mensagem
                'Protegido' => '', //campo usado em desenvolvimento, se tiver um email preenchido entao todos os emails enviados terao o destinatario ignorado e substituído por este valor (evita envio incorreto de email)
                /*  Abaixo chave opcional desativada com exemplo de preenchimento
                'Dominios' => array(	// Opcional. Permite especificar o conjunto de atributos acima individualmente para cada domínio de conta remetente. Se não existir um domínio mapeado então utilizará os atributos gerais da chave InfraMail.
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
