# Modificações realizadas pelo Gemini

## Módulo de Vulnerabilidades
- **Migration:** Criada/Atualizada a migration `database/migrations/2026_04_30_174716_create_vulnerabilities_table.php` com os campos `asset_id`, `title`, `description`, `cvss_score` e `status`.
- **Model:** Criado/Atualizado o model `app/Models/Vulnerability.php` com `$fillable` e relacionamento `belongsTo` com `Asset`.
- **Factory:** Criada a factory `database/factories/VulnerabilityFactory.php` com geração automática de `Asset`.
- **Livewire:** Criado/Atualizado o componente `app/Livewire/VulnerabilityManager.php` e sua view `resources/views/livewire/vulnerability-manager.blade.php`.
- **Testes:** Criados testes de Feature usando Pest em `tests/Feature/VulnerabilityTest.php` cobrindo criação bem-sucedida e falha de validação.

## Interface e UX (SOC Style)
- **Login:** Redesenhado em `resources/views/auth/login.blade.php` com estilo SOC (split-screen, dark theme).
- **Layout Guest:** Atualizado em `resources/views/layouts/guest.blade.php` para estilo SOC.
- **Dashboard SOC:** Criado componente `SocDashboard` para exibir métricas de ativos e vulnerabilidades em tempo real.
- **Filtros:** Adicionados filtros em tempo real por Severidade e Ativo no `VulnerabilityManager`.

## Remoções Solicitadas
- **VLibras:** Plugin de acessibilidade removido completamente dos arquivos `app.blade.php` e `guest.blade.php`.
- **Dark Mode:** Removida toda a configuração de tema escuro (`darkMode: 'class'`) do `tailwind.config.js`, os scripts de persistência nos layouts e as classes utilitárias `dark:` dos componentes. O sistema agora opera exclusivamente em modo claro.

## Correções de Rota
- **Redirecionamento:** Atualizada a rota raiz `/` para exigir autenticação e redirecionar corretamente para o dashboard.
