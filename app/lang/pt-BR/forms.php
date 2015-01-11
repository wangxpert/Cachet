<?php

return [
    // Setup form fields
    'setup' => [
        'email'            => 'Email',
        'username'         => 'Usuário',
        'password'         => 'Senha',
        'site_name'        => 'Nome do site',
        'site_domain'      => 'Domínio do site',
        'site_timezone'    => 'Select your timezone',
        'site_locale'      => 'Select your language',
        'enable_google2fa' => 'Enable Google Two Factor Authentication',
    ],

    // Login form fields
    'login' => [
        'email'    => 'Email',
        'password' => 'Senha',
        '2fauth'   => 'Authentication Code',
    ],

    // Incidents form fields
    'incidents' => [
        'name'         => 'Nome',
        'status'       => 'Status',
        'message'      => 'Mensagem',
        'message-help' => 'Você também pode usar o Markdown.',

        'templates' => [
            'name'     => 'Nome',
            'template' => 'Template',
        ],
    ],

    // Components form fields
    'components' => [
        'name'        => 'Nome',
        'status'      => 'Status',
        'group'       => 'Grupo',
        'description' => 'Descrição',
        'link'        => 'Link',
        'tags'        => 'Marcações',
        'tags-help'   => 'Separados por vírgulas.',

        'groups' => [
            'name' => 'Nome',
        ],
    ],

    // Settings
    'settings' => [
        /// Application setup
        'app-setup' => [
            'site-name'         => 'Nome do site',
            'site-url'          => 'URL do site',
            'site-timezone'     => 'Site Timezone',
            'site-locale'       => 'Site Language',
            'about-this-page'   => 'Sobre esta página',
            'days-of-incidents' => 'Quantos dias de incidentes para mostrar?',
            'banner'            => 'Imagem do banner',
            'banner-help'       => "É recomendável que você fazer upload de arquivos menores que 930px.",
            'google-analytics'  => "Google Analytics code",
        ],
        'security' => [
            'allowed-domains'      => 'Domínios permitidos',
            'allowed-domains-help' => 'Separados por vírgula. O domínio definido acima é permitido automaticamente por padrão.',
        ],
        'stylesheet' => [
            'custom-css' => 'Folha de estilos personalizada',
        ],
        'theme' => [
            'background-color' => 'Cor de fundo',
            'text-color'       => 'Cor do Texto',
        ],
    ],

    'user' => [
        'username'     => 'Usuário',
        'email'        => 'Email',
        'password'     => 'Senha',
        'api-key'      => 'Chave da API',
        'api-key-help' => 'Regenerar sua chave de API irá revogar todos os aplicativos existentes.',
        '2fa'          => [
            'help' => 'Enabling two factor authentication increases security of your account. You will need to download <a href="https://support.google.com/accounts/answer/1066447?hl=en">Google Authenticator</a> or a similar app on to your mobile device. When you login you will be asked to provide a token generated by the app.',
        ],
    ],

    // Buttons
    'add'    => 'Adicionar',
    'save'   => 'Salvar',
    'update' => 'Atualizar',
    'create' => 'Criar',
    'edit'   => 'Editar',
    'delete' => 'Apagar',
    'submit' => 'Enviar',
    'cancel' => 'Cancelar',
    'remove' => 'Remover'
];
