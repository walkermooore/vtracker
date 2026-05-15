# VulnTracker 🛡️
### Cybersecurity Asset & Vulnerability Management System

![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=for-the-badge&logo=laravel)
![Livewire](https://img.shields.io/badge/Livewire-3.x-4e73df?style=for-the-badge&logo=livewire)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-336791?style=for-the-badge&logo=postgresql)
![Docker](https://img.shields.io/badge/Docker-Enabled-2496ED?style=for-the-badge&logo=docker)

---

## 🇧🇷 Sobre o Projeto
O **VulnTracker** é uma plataforma robusta e profissional desenvolvida para equipes de Red Team e Blue Team gerenciarem o ciclo de vida completo de vulnerabilidades de segurança. O sistema permite o mapeamento detalhado de ativos, reporte técnico de falhas com pontuação **CVSS**, geração de evidências (PoC) e um registro rigoroso de auditoria para fins de conformidade e transparência.

## 🇺🇸 Project Overview
**VulnTracker** is a professional-grade platform built for Red and Blue Teams to streamline the security vulnerability management lifecycle. It enables detailed asset mapping, technical flaw reporting using **CVSS** scoring, Proof of Concept (PoC) documentation, and maintains a rigorous audit trail for compliance and transparency.

---

## 🚀 Funcionalidades Principais / Key Features

- **🛡️ Asset Management**: Gestão completa de inventário de TI (IPs, URLs, Servidores).
- **🪲 Vulnerability Lifecycle**: Controle de estados (Aberta, Em Correção, Mitigada, Aceita).
- **📊 SOC Dashboard**: Painel analítico em tempo real com métricas de severidade e ativos comprometidos.
- **📑 PDF Reporting**: Geração de relatórios técnicos detalhados para exportação.
- **📜 Audit Trail**: Logs de auditoria imutáveis capturando todas as ações de analistas.
- **📧 Critical Alerts**: Sistema de notificações por e-mail para vulnerabilidades de alta criticidade.
- **⚖️ CVSS Scoring**: Cálculo integrado de severidade baseado no padrão da indústria.

---

## 🛠️ Stack Tecnológica / Tech Stack

- **Backend**: PHP 8.3+ | Laravel 13 (Blade & Volt)
- **Frontend**: Livewire 3 (Reactive components) | Tailwind CSS
- **Database**: PostgreSQL 16
- **Infrastructure**: Docker & Docker Compose
- **Testing**: Pest PHP
- **Utilities**: Mailpit (E-mail testing) | DomPDF (PDF generation)

---

## ⚙️ Instalação / Installation

### Pré-requisitos
- Docker & Docker Compose
- Git

### Passo a Passo

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/leowalker/vulntracker.git
   cd vulntracker
   ```

2. **Configuração de Ambiente:**
   ```bash
   cp .env.example .env
   ```

3. **Suba os containers (Docker):**
   ```bash
   docker compose up -d
   ```

4. **Instale as dependências e prepare o banco:**
   ```bash
   # Entre no container da aplicação
   docker exec -it pgv_app bash

   # Dentro do container:
   composer install
   php artisan key:generate
   php artisan migrate --seed
   ```

5. **Compile os assets (Frontend):**
   ```bash
   # Caso não tenha o Node local, use o container:
   docker exec -it pgv_node npm install
   docker exec -it pgv_node npm run build
   ```

6. **Acesse a aplicação:**
   - **App**: `http://localhost:8000`
   - **Mailpit (E-mails)**: `http://localhost:8025`

---

## 🧪 Testes / Testing

O projeto utiliza **Pest PHP** para garantir a estabilidade e segurança das funcionalidades principais.

```bash
docker exec -it pgv_app php artisan test
```

---

## 📁 Estrutura do Projeto / Project Structure (Highlights)
- `app/Models`: Definição de Ativos, Vulnerabilidades e Auditoria.
- `app/Livewire`: Componentes interativos do dashboard e gerenciadores.
- `app/Observers`: Gatilhos automáticos para logs de auditoria.
- `resources/views/reports`: Templates para exportação de PDFs.

---

## 👨‍💻 Autor / Author
**Léo Walker da Silva**
- Computer Science Student (UNEMAT)
- Cybersecurity Enthusiast
- English C2 Proficient

---

## 📄 Licença / License
Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.
