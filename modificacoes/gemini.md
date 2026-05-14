# Modificações realizadas pelo Gemini

## Módulo de Vulnerabilidades
- **Migration:** Criada/Atualizada a migration `database/migrations/2026_04_30_174716_create_vulnerabilities_table.php` com os campos `asset_id`, `title`, `description`, `cvss_score` e `status`.
- **Model:** Criado/Atualizado o model `app/Models/Vulnerability.php` com `$fillable` e relacionamento `belongsTo` com `Asset`.
- **Factory:** Criada a factory `database/factories/VulnerabilityFactory.php` com geração automática de `Asset`.
- **Livewire:** Criado/Atualizado o componente `app/Livewire/VulnerabilityManager.php` e sua view `resources/views/livewire/vulnerability-manager.blade.php`.
- **Testes:** Criados testes de Feature usando Pest em `tests/Feature/VulnerabilityTest.php` cobrindo criação bem-sucedida e falha de validação.
