<x-mail::message>
    # 🚨 Alerta de Segurança Crítico

    Uma vulnerabilidade com severidade **CRÍTICA** foi identificada ou atualizada no sistema.

    **Detalhes do Alerta:**
    * **Ativo:** {{ $vulnerability->asset->name }}
    * **Vulnerabilidade:** {{ $vulnerability->title }}
    * **Analista Responsável:** {{ $vulnerability->reporter->name }}

    <x-mail::button :url="url('/vulnerabilities/' . $vulnerability->id)">
        Acessar Painel de Triagem
    </x-mail::button>

    Este é um envio automático do sistema de gerenciamento de vulnerabilidades.

    Atenciosamente,<br>
    **Equipe de CyberSecurity - {{ config('app.name') }}**
</x-mail::message>
