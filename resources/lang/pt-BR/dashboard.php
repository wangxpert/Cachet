<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    'dashboard' => 'Dashboard',

    // Incidents
    'incidents' => [
        'title'                    => 'Incidentes &amp; Agenda',
        'incidents'                => 'Incidentes',
        'logged'                   => '{0} Não existem incidentes, bom trabalho.|Você registrou um incidente.|Você reportou <strong>:count</strong> incidentes.',
        'incident-create-template' => 'Criar template',
        'incident-templates'       => 'Template de incidentes',
        'add'                      => [
            'title'   => 'Report an incident',
            'success' => 'Incidente adicionado.',
            'failure' => 'Algo deu errado com o incidente.',
        ],
        'edit' => [
            'title'   => 'Edit an incident',
            'success' => 'Incidente atualizado.',
            'failure' => 'Algo deu errado com o incidente.',
        ],
        'delete' => [
            'success' => 'The incident has been deleted and will not show on your status page.',
            'failure' => 'The incident could not be deleted. Please try again.',
        ],

        // Incident templates
        'templates' => [
            'title' => 'Template de incidentes',
            'add'   => [
                'title'   => 'Create an incident template',
                'message' => 'You should add an incident template.',
                'success' => 'Template criado.',
                'failure' => 'Algo deu errado com o template de incidente.',
            ],
            'edit' => [
                'title'   => 'Edit Template',
                'success' => 'Template foi atualizado!',
                'failure' => 'Algo deu errado atualizando o template de incidente',
            ],
            'delete' => [
                'success' => 'The incident template has been deleted.',
                'failure' => 'The incident template could not be deleted. Please try again.',
            ],
        ],
    ],

    // Incident Maintenance
    'schedule' => [
        'schedule'     => 'Manutenção Agendada',
        'logged'       => '{0} There are no schedules, good work.|You have logged one schedule.|You have reported <strong>:count</strong> schedules.',
        'scheduled_at' => 'Agendada em :timestamp',
        'add'          => [
            'title'   => 'Adicionar manutenção programada',
            'success' => 'Agenda adicionada.',
            'failure' => 'Aconteceu algo errado ao adicionar o cronograma.',
        ],
        'edit' => [
            'title'   => 'Editar manutenção programada',
            'success' => 'Agenda foi atualizada!',
            'failure' => 'Aconteceu algo errado ao editar o cronograma.',
        ],
        'delete' => [
            'success' => 'O cronograma foi excluído e não aparecerá na sua página de status.',
            'failure' => 'O cronograma não pôde ser excluído. Por favor, tente novamente.',
        ],
    ],

    // Components
    'components' => [
        'components'         => 'Componentes',
        'component_statuses' => 'Status do componente',
        'listed_group'       => 'Agrupados sob :name',
        'add'                => [
            'title'   => 'Add a component',
            'message' => 'Você deve adicionar um componente.',
            'success' => 'Componente criado.',
            'failure' => 'Algo deu errado com o componente.',
        ],
        'edit' => [
            'title'   => 'Edit a component',
            'success' => 'Componente atualizado.',
            'failure' => 'Algo deu errado com o componente.',
        ],
        'delete' => [
            'success' => 'The component has been deleted!',
            'failure' => 'The component could not be deleted. Please try again.',
        ],

        // Component groups
        'groups' => [
            'groups'        => 'Grupo de componente|Grupos de componente',
            'no_components' => 'Você deve adicionar um componente à um grupo.',
            'add'           => [
                'title'   => 'Add a component group',
                'success' => 'Grupo de componente adicionado.',
                'failure' => 'Algo deu errado com o grupo de componente.',
            ],
            'edit' => [
                'title'   => 'Edit a component group',
                'success' => 'Grupo de componentes atualizado.',
                'failure' => 'Algo deu errado com o grupo de componentes.',
            ],
            'delete' => [
                'success' => 'Component group has been deleted!',
                'failure' => 'The component group could not be deleted. Please try again.',
            ],
        ],
    ],

    // Metrics
    'metrics' => [
        'metrics' => 'Metricas',
        'add'     => [
            'title'   => 'Create a metric',
            'message' => 'You should add a metric.',
            'success' => 'Métrica criada.',
            'failure' => 'Algo deu errado com a métrica.',
        ],
        'edit' => [
            'title'   => 'Edit a metric',
            'success' => 'Métrica atualizada.',
            'failure' => 'Algo deu errado com a métrica.',
        ],
        'delete' => [
            'success' => 'The metric has been deleted and will no longer display on your status page.',
            'failure' => 'The metric could not be deleted. Please try again.',
        ],
    ],
    // Subscribers
    'subscribers' => [
        'subscribers'  => 'Inscritos',
        'description'  => 'Todos os inscritos receberão atualizações quando novos incidentes forem criados.',
        'verified'     => 'Verificado',
        'not_verified' => 'Não verificado',
        'add'          => [
            'title'   => 'Add a new subscriber',
            'success' => 'Inscrito adicionado.',
            'failure' => 'Algo deu errado com o componente.',
        ],
        'edit' => [
            'title'   => 'Update subscriber',
            'success' => 'Inscrito atualizado.',
            'failure' => 'Algo deu errado duante a atualização.',
        ],
    ],

    // Team
    'team' => [
        'team'        => 'Equipe',
        'member'      => 'Membro',
        'profile'     => 'Perfil	',
        'description' => 'Membros da equipe serão capazes de adicionar, modificar &amp; editar componentes e incidentes.',
        'add'         => [
            'title'   => 'Add a new team member',
            'success' => 'Membro da equipe adicionado.',
            'failure' => 'Ocorreu um problema ao excluir esse usuário.',
        ],
        'edit' => [
            'title'   => 'Update profile',
            'success' => 'Perfil atualizado.',
            'failure' => 'Algo deu errado duante a atualização.',
        ],
        'delete' => [
            'success' => 'Team member has been deleted and will no longer have access to the dashboard!',
            'failure' => 'Ocorreu um problema ao excluir esse usuário.',
        ],
        'invite' => [
            'title'   => 'Invite a new team member',
            'success' => 'An invite has been sent',
            'failure' => 'The invite could not be sent. Please try again.',
        ],
    ],

    // Settings
    'settings' => [
        'settings'  => 'Configurações',
        'app-setup' => [
            'app-setup'   => 'Instalação do aplicativo',
            'images-only' => 'Somente imagens podem ser carregadas.',
            'too-big'     => 'O arquivo que você carregou é muito grande. Envie uma imagem inferior à :size',
        ],
        'analytics' => [
            'analytics' => 'Analytics',
        ],
        'localization' => [
            'localization' => 'Localization',
        ],
        'security' => [
            'security'   => 'Segurança',
            'two-factor' => 'Usuários sem autenticação de dois fatores',
        ],
        'stylesheet' => [
            'stylesheet' => 'Folha de estilo',
        ],
        'theme' => [
            'theme' => 'Tema',
        ],
        'edit' => [
            'success' => 'Configurações salvas.',
            'failure' => 'Não foi possível salvar as configurações.',
        ],
    ],

    // Login
    'login' => [
        'login'      => 'Login',
        'logged_in'  => 'Você está logado.',
        'welcome'    => 'Bem-vindo de volta!',
        'two-factor' => 'Por favor insira o seu token.',
    ],

    // Sidebar footer
    'help'        => 'Ajuda',
    'status_page' => 'Página de status',
    'logout'      => 'Sair',

    // Notifications
    'notifications' => [
        'notifications' => 'Notificações',
        'awesome'       => 'Excelente.',
        'whoops'        => 'Opa.',
    ],

    // Welcome modal
    'welcome' => [
        'welcome' => 'Welcome to your status page!',
        'message' => 'Sua página de status está quase pronta! Tavez vocë queira checar essas configurações extras',
        'close'   => 'Basta ir direto para o meu painel de controle',
        'steps'   => [
            'component'  => 'Criar componentes',
            'incident'   => 'Criar incidentes',
            'customize'  => 'Personalizar',
            'team'       => 'Adicionar usuários',
            'api'        => 'Gerar token de API',
            'two-factor' => 'Autenticação em duas etapas',
        ],
    ],

];
